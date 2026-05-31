<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Admin | SIPANTAU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="flex h-screen">
        @include('partials.sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            <div class="bg-white border-b border-slate-200 px-8 py-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Dashboard Admin</h1>
                    <p class="text-sm text-slate-600 mt-1">Ringkasan laporan, verifikasi, dan aktivitas masyarakat.</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('profile.edit') }}" title="Edit Profil" class="rounded-full bg-emerald-100 p-3 inline-flex items-center justify-center text-emerald-700 hover:bg-emerald-200 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h4m-8 6h6m6 2v-5a2 2 0 00-2-2h-5M7 9V7a2 2 0 012-2h5a2 2 0 012 2v2" />
                        </svg>
                    </a>
                    <div class="text-right">
                        <p class="text-sm text-slate-500">Selamat datang, Admin</p>
                        <p class="text-xl font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-auto p-8 space-y-6">
                <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm text-slate-500">Total Laporan</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ $totalLaporan }}</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm text-slate-500">Menunggu Verifikasi</p>
                        <p class="mt-4 text-3xl font-semibold text-amber-600">{{ $pendingLaporan }}</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm text-slate-500">Laporan Diproses</p>
                        <p class="mt-4 text-3xl font-semibold text-sky-600">{{ $processingLaporan }}</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm text-slate-500">Laporan Selesai</p>
                        <p class="mt-4 text-3xl font-semibold text-emerald-700">{{ $completedLaporan }}</p>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[1.6fr_1fr]">
                    <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">Laporan Terbaru</h2>
                                <p class="text-sm text-slate-500 mt-1">Lihat laporan terbaru dari masyarakat.</p>
                            </div>
                            <a href="{{ route('laporans.index') }}" class="text-sm font-medium text-emerald-700 hover:text-emerald-900">Lihat semua</a>
                        </div>

                        <div class="mt-6 space-y-4">
                            @forelse($recentLaporans as $laporan)
                                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                                    <div class="flex items-center justify-between gap-4">
                                        <div>
                                            <h3 class="font-semibold text-slate-900">{{ Str::limit($laporan->judul, 50) }}</h3>
                                            <p class="text-sm text-slate-600 mt-1">{{ $laporan->user->name }} — {{ $laporan->created_at->translatedFormat('d M Y') }}</p>
                                        </div>
                                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">{{ ucfirst($laporan->status) }}</span>
                                    </div>
                                    <p class="mt-3 text-sm text-slate-600">{{ Str::limit($laporan->deskripsi, 120) }}</p>
                                </div>
                            @empty
                                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-6 text-center text-slate-600">
                                    Belum ada laporan terbaru.
                                </div>
                            @endforelse
                        </div>
                    </section>

                    <aside class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-slate-900">Statistik Cepat</h2>
                        <div class="mt-5 space-y-4">
                            <div class="flex items-center justify-between rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="text-sm text-slate-500">Total Masyarakat</p>
                                    <p class="mt-1 text-xl font-semibold text-slate-900">{{ $totalUsers }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="text-sm text-slate-500">Laporan Belum Diverifikasi</p>
                                    <p class="mt-1 text-xl font-semibold text-slate-900">{{ $unverifiedLaporan }}</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between rounded-3xl border border-slate-200 bg-slate-50 px-4 py-4">
                                <div>
                                    <p class="text-sm text-slate-500">Verifikasi Selesai</p>
                                    <p class="mt-1 text-xl font-semibold text-slate-900">{{ $verifiedReports }}</p>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
