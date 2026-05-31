<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->get();

        $totalLaporan = $laporans->count();
        $diproses = $laporans->where('status', 'diproses')->count();
        $selesai = $laporans->where('status', 'selesai')->count();
        $menunggu = $laporans->where('status', 'menunggu')->count();

        $hotspots = $laporans
            ->groupBy('lokasi')
            ->sortByDesc(fn ($group) => $group->count())
            ->take(2)
            ->map(fn ($group, $lokasi) => ['lokasi' => $lokasi, 'count' => $group->count()]);

        $mapMarkers = $laporans->map(function ($laporan) {
            return [
                'id' => $laporan->id,
                'judul' => $laporan->judul,
                'lokasi' => $laporan->lokasi,
                'status' => $laporan->status,
                'latitude' => $laporan->latitude,
                'longitude' => $laporan->longitude,
                'iconColor' => match ($laporan->status) {
                    'selesai' => 'emerald',
                    'diproses' => 'amber',
                    'menunggu' => 'red',
                    default => 'slate',
                },
            ];
        })->filter(fn ($marker) => filled($marker['latitude']) && filled($marker['longitude']))->values();

        return view('peta', compact(
            'laporans',
            'totalLaporan',
            'diproses',
            'selesai',
            'menunggu',
            'hotspots',
            'mapMarkers'
        ));
    }
}
