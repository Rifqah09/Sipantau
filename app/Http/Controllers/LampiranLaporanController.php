<?php

namespace App\Http\Controllers;

use App\Models\LampiranLaporan;
use App\Models\Laporan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LampiranLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lampiranLaporans = LampiranLaporan::latest()->with('laporan')->get();

        return view('lampiran-laporans.index', compact('lampiranLaporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laporans = Laporan::orderBy('created_at', 'desc')->get();

        return view('lampiran-laporans.create', compact('laporans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'laporan_id' => ['required', 'integer', 'exists:laporans,id'],
            'photo' => ['required', 'image', 'max:5120'],
        ]);

        $path = $request->file('photo')->store('lampiran-laporans', 'public');

        LampiranLaporan::create([
            'laporan_id' => $validated['laporan_id'],
            'file_path' => $path,
            'file_type' => $request->file('photo')->getClientMimeType(),
        ]);

        return redirect()->route('lampiran-laporans.index')->with('success', 'Lampiran berhasil diunggah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lampiranLaporan = LampiranLaporan::with('laporan')->findOrFail($id);

        return view('lampiran-laporans.show', compact('lampiranLaporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lampiranLaporan = LampiranLaporan::findOrFail($id);
        $laporans = Laporan::orderBy('created_at', 'desc')->get();

        return view('lampiran-laporans.edit', compact('lampiranLaporan', 'laporans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lampiranLaporan = LampiranLaporan::findOrFail($id);

        $validated = $request->validate([
            'laporan_id' => ['required', 'integer', 'exists:laporans,id'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $data = [
            'laporan_id' => $validated['laporan_id'],
        ];

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('lampiran-laporans', 'public');
            $data['file_path'] = $path;
            $data['file_type'] = $request->file('photo')->getClientMimeType();
        }

        $lampiranLaporan->update($data);

        return redirect()->route('lampiran-laporans.show', $lampiranLaporan)->with('success', 'Lampiran diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lampiranLaporan = LampiranLaporan::findOrFail($id);
        $lampiranLaporan->delete();

        return redirect()->route('lampiran-laporans.index');
    }
}
