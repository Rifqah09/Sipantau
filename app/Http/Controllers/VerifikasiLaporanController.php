<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\VerifikasiLaporan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifikasiLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $pendingLaporans = Laporan::whereDoesntHave('verifikasiLaporans')->latest()->get();
        $verifikasiLaporans = VerifikasiLaporan::latest()->with(['laporan.user', 'admin'])->get();

        return view('verifikasi-laporans.index', compact('pendingLaporans', 'verifikasiLaporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $laporans = Laporan::whereDoesntHave('verifikasiLaporans')->orderBy('created_at', 'desc')->get();
        $laporanId = $request->query('laporan_id');

        return view('verifikasi-laporans.create', compact('laporans', 'laporanId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'laporan_id' => ['required', 'integer', 'exists:laporans,id'],
            'status' => ['required', 'in:diterima,ditolak'],
            'catatan' => ['nullable', 'string'],
        ]);

        $validated['admin_id'] = Auth::id();

        $verifikasi = VerifikasiLaporan::create($validated);

        $laporan = Laporan::findOrFail($validated['laporan_id']);
        $laporan->status = $validated['status'] === 'diterima' ? 'diproses' : 'ditolak';
        $laporan->save();

        return redirect()->route('verifikasi-laporans.index')->with('success', 'Verifikasi laporan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $verifikasiLaporan = VerifikasiLaporan::with(['laporan.user', 'admin'])->findOrFail($id);

        return view('verifikasi-laporans.show', compact('verifikasiLaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $verifikasiLaporan = VerifikasiLaporan::findOrFail($id);
        $laporans = Laporan::orderBy('created_at', 'desc')->get();

        return view('verifikasi-laporans.edit', compact('verifikasiLaporan', 'laporans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $verifikasiLaporan = VerifikasiLaporan::findOrFail($id);

        $validated = $request->validate([
            'laporan_id' => ['required', 'integer', 'exists:laporans,id'],
            'status' => ['required', 'in:diterima,ditolak'],
            'catatan' => ['nullable', 'string'],
        ]);

        $verifikasiLaporan->update([
            'laporan_id' => $validated['laporan_id'],
            'status' => $validated['status'],
            'catatan' => $validated['catatan'] ?? null,
        ]);

        $laporan = Laporan::findOrFail($validated['laporan_id']);
        $laporan->status = $validated['status'] === 'diterima' ? 'diproses' : 'ditolak';
        $laporan->save();

        return redirect()->route('verifikasi-laporans.show', $verifikasiLaporan)->with('success', 'Verifikasi laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Auth::user()?->isAdmin()) {
            abort(403);
        }

        $verifikasiLaporan = VerifikasiLaporan::findOrFail($id);
        $verifikasiLaporan->delete();

        return redirect()->route('verifikasi-laporans.index')->with('success', 'Verifikasi telah dihapus.');
    }
}
