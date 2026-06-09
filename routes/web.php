<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LampiranLaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\VerifikasiLaporanController;
use App\Models\Laporan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/peta', [\App\Http\Controllers\PetaController::class, 'index'])->name('peta');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::get('/admin/waktu-eksekusi', [AdminDashboardController::class, 'executionTime'])
        ->name('admin.execution-time');

    Route::get('/petugas/dashboard', function () {
        if (! auth()->user()?->isPetugas()) {
            abort(403);
        }

        $pending = Laporan::where('status', 'menunggu')->count();
        $processing = Laporan::where('status', 'diproses')->count();
        $completed = Laporan::where('status', 'selesai')->count();
        $responses = Tanggapan::where('petugas_id', auth()->id())->count();
        $laporans = Laporan::where('status', 'diproses')->with('user')->latest()->get();

        return view('petugas.dashboard', compact('pending', 'processing', 'completed', 'responses', 'laporans'));
    })->name('petugas.dashboard');

    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->isPetugas()) {
            return redirect()->route('petugas.dashboard');
        }

        $laporans = auth()->user()->laporans()->with(['lampiranLaporans', 'verifikasiLaporans', 'tanggapans'])->latest()->get();
        $executionMinutes = $laporans
            ->where('status', 'selesai')
            ->map(fn (Laporan $laporan) => $laporan->executionMinutes())
            ->filter();

        $formatExecutionDuration = function (int $minutes): string {
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
        };

        $averageExecutionMinutes = (int) round($executionMinutes->avg() ?? 0);
        $averageExecutionLabel = $averageExecutionMinutes > 0
            ? $formatExecutionDuration($averageExecutionMinutes)
            : 'Belum ada';

        return view('masyarakat.dashboard', compact('laporans', 'averageExecutionLabel'));
    })->name('dashboard');

    Route::get('/edukasi', function () {
        return view('edukasi');
    })->name('edukasi');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('laporans', LaporanController::class);
    Route::resource('tanggapans', TanggapanController::class);
    Route::resource('lampiran-laporans', LampiranLaporanController::class);
    Route::resource('verifikasi-laporans', VerifikasiLaporanController::class);
});

require __DIR__.'/auth.php';
