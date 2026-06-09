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
        $completedExecutionMinutes = Laporan::where('status', 'selesai')
            ->with(['verifikasiLaporans', 'tanggapans'])
            ->get()
            ->map(fn (Laporan $laporan) => $laporan->executionMinutes())
            ->filter()
            ->values();
        $averageExecutionMinutes = (int) round($completedExecutionMinutes->avg() ?? 0);
        $averageExecutionLabel = $averageExecutionMinutes > 0
            ? $this->formatExecutionDuration($averageExecutionMinutes)
            : 'Belum ada';
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
            'averageExecutionLabel',
            'recentLaporans'
        ));
    }

    public function executionTime(): View
    {
        if (! auth()->user()?->isAdmin()) {
            abort(403);
        }

        $executionReports = Laporan::with(['user', 'tanggapans'])
            ->latest()
            ->get()
            ->map(function (Laporan $laporan) {
                $startedAt = $laporan->executionStartedAt();
                $endedAt = $laporan->executionEndedAt();
                $executionMinutes = $laporan->executionMinutes();

                return [
                    'laporan' => $laporan,
                    'started_at' => $startedAt,
                    'ended_at' => $endedAt,
                    'execution_minutes' => $executionMinutes,
                    'execution_label' => $executionMinutes ? $this->formatExecutionDuration($executionMinutes) : 'Belum lengkap',
                ];
            });

        $reportedCount = $executionReports->count();
        $completedReports = $executionReports->filter(fn (array $item) => $item['execution_minutes'] !== null);
        $averageExecutionMinutes = (int) round($completedReports->avg('execution_minutes') ?? 0);
        $averageExecutionLabel = $this->formatExecutionDuration($averageExecutionMinutes);
        $slowestReport = $completedReports->sortByDesc('execution_minutes')->first();

        return view('admin.execution-time', compact(
            'executionReports',
            'reportedCount',
            'completedReports',
            'averageExecutionMinutes',
            'averageExecutionLabel',
            'slowestReport'
        ));
    }

    private function formatExecutionDuration(int $minutes): string
    {
        $days = intdiv($minutes, 1440);
        $hours = intdiv($minutes % 1440, 60);
        $remainingMinutes = $minutes % 60;

        $parts = [];

        if ($days > 0) {
            $parts[] = $days . ' hari';
        }

        if ($hours > 0) {
            $parts[] = $hours . ' jam';
        }

        if ($remainingMinutes > 0 || empty($parts)) {
            $parts[] = $remainingMinutes . ' menit';
        }

        return implode(' ', array_slice($parts, 0, 2));
    }
}
