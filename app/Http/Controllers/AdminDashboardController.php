<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\VerifikasiLaporan;
use App\Models\User;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        if (! auth()->user()?->isAdmin()) {
            abort(403);
        }

        $totalLaporan = Laporan::count();
        $pendingLaporan = Laporan::where('status', 'menunggu')->count();
        $processingLaporan = Laporan::where('status', 'diproses')->count();
        $completedLaporan = Laporan::where('status', 'selesai')->count();
        $totalUsers = User::where('role', User::ROLE_MASYARAKAT)->count();
        $verifiedReports = VerifikasiLaporan::count();
        $unverifiedLaporan = Laporan::whereDoesntHave('verifikasiLaporans')->count();
        $recentLaporans = Laporan::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalLaporan',
            'pendingLaporan',
            'processingLaporan',
            'completedLaporan',
            'totalUsers',
            'verifiedReports',
            'unverifiedLaporan',
            'recentLaporans'
        ));
    }
}
