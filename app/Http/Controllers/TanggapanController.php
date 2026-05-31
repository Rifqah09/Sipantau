<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Tanggapan;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanggapans = Tanggapan::latest()->with(['laporan', 'petugas'])->get();

        return view('tanggapans.index', compact('tanggapans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Auth::user()?->isPetugas()) {
            abort(403);
        }

        $laporans = Laporan::where('status', 'diproses')->orderBy('created_at', 'desc')->get();

        return view('tanggapans.create', compact('laporans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Auth::user()?->isPetugas()) {
            abort(403);
        }

        $validated = $request->validate([
            'laporan_id' => ['required', 'integer', 'exists:laporans,id'],
            'isi_tanggapan' => ['required', 'string'],
            'foto_bukti' => ['nullable', 'image', 'max:5120'],
        ]);

        $laporan = Laporan::findOrFail($validated['laporan_id']);

        $data = [
            'laporan_id' => $laporan->id,
            'petugas_id' => Auth::id(),
            'isi_tanggapan' => $validated['isi_tanggapan'],
        ];

        if ($request->hasFile('foto_bukti')) {
            $data['foto_bukti'] = $request->file('foto_bukti')->store('tanggapan-bukti', 'public');
        }

        Tanggapan::create($data);
        $laporan->status = 'selesai';
        $laporan->save();

        return redirect()->route('laporans.show', $laporan)->with('success', 'Tanggapan berhasil disimpan dan laporan ditandai selesai.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tanggapan = Tanggapan::with(['laporan', 'petugas'])->findOrFail($id);

        return view('tanggapans.show', compact('tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $laporans = Laporan::orderBy('created_at', 'desc')->get();

        return view('tanggapans.edit', compact('tanggapan', 'laporans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);

        $validated = $request->validate([
            'laporan_id' => ['required', 'integer', 'exists:laporans,id'],
            'isi_tanggapan' => ['required', 'string'],
            'foto_bukti' => ['nullable', 'image', 'max:5120'],
        ]);

        $data = [
            'laporan_id' => $validated['laporan_id'],
            'isi_tanggapan' => $validated['isi_tanggapan'],
        ];

        if ($request->hasFile('foto_bukti')) {
            $data['foto_bukti'] = $request->file('foto_bukti')->store('tanggapan-bukti', 'public');
        }

        $tanggapan->update($data);

        return redirect()->route('tanggapans.show', $tanggapan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->delete();

        return redirect()->route('tanggapans.index');
    }
}
