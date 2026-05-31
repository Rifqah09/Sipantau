<?php

namespace App\Http\Controllers;

use App\Models\LampiranLaporan;
use App\Models\Laporan;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $laporans = Laporan::latest()
            ->when($user->isMasyarakat(), function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->with(['user', 'lampiranLaporans', 'verifikasiLaporans'])
            ->get();

        return view('laporans.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        if (! $user->isMasyarakat()) {
            abort(403);
        }

        return view('laporans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if (! $user->isMasyarakat()) {
            abort(403);
        }

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tanggal' => ['nullable', 'date'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $laporan = Laporan::create([
            'user_id' => $user->id,
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi' => $validated['lokasi'],
            'tanggal' => $validated['tanggal'] ?? null,
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'status' => 'menunggu',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('lampiran-laporans', 'public');

            LampiranLaporan::create([
                'laporan_id' => $laporan->id,
                'file_path' => $path,
                'file_type' => $request->file('photo')->getClientMimeType(),
            ]);
        }

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laporan = Laporan::with(['user', 'tanggapans', 'lampiranLaporans', 'verifikasiLaporans'])->findOrFail($id);
        $user = Auth::user();

        if ($user->isMasyarakat() && $laporan->user_id !== $user->id) {
            abort(403);
        }

        return view('laporans.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $user = Auth::user();

        if ($user->isMasyarakat() && $laporan->user_id !== $user->id) {
            abort(403);
        }

        return view('laporans.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $user = Auth::user();

        if ($user->isMasyarakat() && $laporan->user_id !== $user->id) {
            abort(403);
        }

        $validated = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tanggal' => ['nullable', 'date'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'photo' => ['nullable', 'image', 'max:5120'],
            'status' => ['nullable', 'in:menunggu,diproses,selesai'],
        ]);

        $laporan->update([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'lokasi' => $validated['lokasi'],
            'tanggal' => $validated['tanggal'] ?? $laporan->tanggal,
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'status' => $user->isMasyarakat() ? $laporan->status : ($validated['status'] ?? $laporan->status),
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('lampiran-laporans', 'public');

            LampiranLaporan::create([
                'laporan_id' => $laporan->id,
                'file_path' => $path,
                'file_type' => $request->file('photo')->getClientMimeType(),
            ]);
        }

        return redirect()->route('laporans.show', $laporan)->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);
        $user = Auth::user();

        if ($user->isMasyarakat() && $laporan->user_id !== $user->id) {
            abort(403);
        }

        $laporan->delete();

        return redirect()->route('laporans.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
