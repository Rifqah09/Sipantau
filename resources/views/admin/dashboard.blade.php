<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard Admin') }}</h2>
                <p class="text-sm text-slate-500">Ringkasan laporan, verifikasi, dan aktivitas masyarakat.</p>
            </div>
        </div>
    </x-slot>

    {{-- Custom styles --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        .sipantau-dash * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Stat cards */
        .stat-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px -4px rgba(0,0,0,0.08);
        }
        .stat-card .bg-dot {
            position: absolute;
            top: 0; right: 0;
            width: 90px; height: 90px;
            border-radius: 50%;
            transform: translate(30px, -30px);
            opacity: 0.12;
        }

        /* Report items */
        .report-item {
            transition: transform 0.15s ease, border-color 0.2s ease;
        }
        .report-item:hover {
            transform: translateX(4px);
            border-color: #a7f3d0;
        }

        /* Animated count-up */
        .count-animated {
            transition: all 0.8s ease;
        }

        /* Tab buttons */
        .tab-btn {
            transition: all 0.18s ease;
        }
        .tab-btn.active {
            background: white;
            color: #065f46;
            box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        }

        /* Bar chart animation */
        .bar-fill {
            transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Pulse for live indicator */
        @keyframes sipantau-pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }
        .live-dot {
            display: inline-block;
            width: 7px; height: 7px;
            background: #10b981;
            border-radius: 50%;
            margin-right: 5px;
            animation: sipantau-pulse 2s infinite;
        }
    </style>

    <div class="min-h-[calc(100vh-5rem)] overflow-auto bg-slate-100 sipantau-dash">
        <div class="p-4 sm:p-8 space-y-6">

            {{-- ===== HERO SECTION ===== --}}
            <section class="rounded-2xl border border-slate-200 bg-white px-8 py-7 shadow-sm">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                    <div>
                        <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1 text-[11px] font-bold uppercase tracking-widest text-emerald-700">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            Admin SIPANTAU
                        </span>
                        <h1 class="mt-3 text-3xl font-extrabold text-slate-900 tracking-tight">Ringkasan Laporan &amp; Verifikasi</h1>
                        <p class="mt-2.5 max-w-xl text-sm text-slate-500 leading-7">
                            Kelola seluruh laporan masyarakat, tinjau status verifikasi, dan pantau kegiatan penanganan dengan cepat dan efisien.
                        </p>
                        <div class="mt-4 flex items-center gap-4">
                            <a href="{{ route('laporans.index') }}"
                               class="inline-flex items-center gap-1.5 rounded-xl bg-emerald-600 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-700 transition-colors">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Kelola Laporan
                            </a>
                            <span class="text-sm text-slate-400">{{ now()->translatedFormat('d F Y') }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 rounded-2xl bg-slate-50 border border-slate-200 px-6 py-5">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h4l3 8 4-16 3 8h4"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-[10px] uppercase tracking-[0.3em] font-bold text-slate-400">Aktivitas</p>
                            <p class="mt-0.5 text-sm font-bold text-slate-800">Real-time monitoring</p>
                            <p class="text-xs text-slate-500 flex items-center gap-1 mt-0.5">
                                <span class="live-dot"></span> Sistem aktif
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ===== STAT CARDS ===== --}}
            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                {{-- Total Laporan --}}
                <div class="stat-card relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="bg-dot bg-emerald-400"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Total Laporan</p>
                            <p class="mt-3 text-4xl font-extrabold text-slate-900 count-up" data-target="{{ $totalLaporan }}">0</p>
                        </div>
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </span>
                    </div>
                    <p class="mt-3 text-xs text-slate-400 font-medium">Semua laporan masuk</p>
                </div>

                {{-- Menunggu Verifikasi --}}
                <div class="stat-card relative overflow-hidden rounded-2xl border border-amber-100 bg-white p-6 shadow-sm">
                    <div class="bg-dot bg-amber-400"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Menunggu Verifikasi</p>
                            <p class="mt-3 text-4xl font-extrabold text-amber-600 count-up" data-target="{{ $pendingLaporan }}">0</p>
                        </div>
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                    </div>
                    <p class="mt-3 text-xs font-medium flex items-center gap-1 text-amber-600">
                        <span class="live-dot" style="background:#f59e0b"></span> Perlu ditinjau segera
                    </p>
                </div>

                {{-- Sedang Diproses --}}
                <div class="stat-card relative overflow-hidden rounded-2xl border border-sky-100 bg-white p-6 shadow-sm">
                    <div class="bg-dot bg-sky-400"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Sedang Diproses</p>
                            <p class="mt-3 text-4xl font-extrabold text-sky-600 count-up" data-target="{{ $processingLaporan }}">0</p>
                        </div>
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-sky-600">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </span>
                    </div>
                    <p class="mt-3 text-xs text-sky-500 font-medium">Dalam penanganan aktif</p>
                </div>

                {{-- Laporan Selesai --}}
                <div class="stat-card relative overflow-hidden rounded-2xl border border-emerald-100 bg-white p-6 shadow-sm">
                    <div class="bg-dot bg-emerald-400"></div>
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">Laporan Selesai</p>
                            <p class="mt-3 text-4xl font-extrabold text-emerald-700 count-up" data-target="{{ $completedLaporan }}">0</p>
                        </div>
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                    </div>
                    <p class="mt-3 text-xs text-emerald-600 font-medium">Berhasil diselesaikan</p>
                </div>

            </div>

            {{-- ===== MAIN GRID: Laporan + Sidebar ===== --}}
            <div class="grid gap-6 xl:grid-cols-[1.6fr_1fr]">

                {{-- Laporan Terbaru --}}
                <section class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Laporan Terbaru</h2>
                            <p class="text-xs text-slate-400 mt-0.5">Laporan masuk terkini dari masyarakat</p>
                        </div>
                        <a href="{{ route('laporans.index') }}"
                           class="text-xs font-semibold text-emerald-600 hover:text-emerald-800 transition-colors">
                            Lihat semua →
                        </a>
                    </div>

                    {{-- Filter Tabs --}}
                    <div class="mb-4 flex gap-1.5 rounded-xl bg-slate-100 p-1">
                        <button onclick="filterReports('all', this)"
                                class="tab-btn active flex-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-600 transition-all">
                            Semua
                        </button>
                        <button onclick="filterReports('menunggu', this)"
                                class="tab-btn flex-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition-all">
                            Menunggu
                        </button>
                        <button onclick="filterReports('diproses', this)"
                                class="tab-btn flex-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition-all">
                            Diproses
                        </button>
                        <button onclick="filterReports('selesai', this)"
                                class="tab-btn flex-1 rounded-lg px-3 py-1.5 text-xs font-semibold text-slate-500 transition-all">
                            Selesai
                        </button>
                    </div>

                    <div id="report-list" class="space-y-3">
                        @forelse($recentLaporans as $laporan)
                            <div class="report-item rounded-2xl border border-slate-200 bg-slate-50 p-4 cursor-pointer"
                                 data-status="{{ $laporan->status }}">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="font-semibold text-sm text-slate-900 truncate">{{ Str::limit($laporan->judul, 52) }}</h3>
                                        <p class="text-xs text-slate-400 mt-0.5">
                                            {{ $laporan->user->name }}
                                            <span class="mx-1">·</span>
                                            {{ $laporan->created_at->translatedFormat('d M Y') }}
                                        </p>
                                    </div>
                                    @php
                                        $statusMap = [
                                            'menunggu'  => 'bg-amber-100 text-amber-800',
                                            'diproses'  => 'bg-sky-100 text-sky-800',
                                            'selesai'   => 'bg-emerald-100 text-emerald-800',
                                            'ditolak'   => 'bg-red-100 text-red-800',
                                        ];
                                        $cls = $statusMap[$laporan->status] ?? 'bg-slate-100 text-slate-700';
                                    @endphp
                                    <span class="flex-shrink-0 rounded-full {{ $cls }} px-2.5 py-1 text-[10px] font-bold tracking-wide uppercase">
                                        {{ ucfirst($laporan->status) }}
                                    </span>
                                </div>
                                <p class="mt-2.5 text-xs text-slate-500 leading-5">{{ Str::limit($laporan->deskripsi, 130) }}</p>
                            </div>
                        @empty
                            <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-8 text-center">
                                <svg class="mx-auto mb-3 h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-sm text-slate-400 font-medium">Belum ada laporan terbaru.</p>
                            </div>
                        @endforelse
                    </div>
                </section>

                {{-- Sidebar --}}
                <aside class="flex flex-col gap-6">

                    {{-- Quick Stats --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-base font-bold text-slate-900 mb-4">Statistik Cepat</h2>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5">
                                <div>
                                    <p class="text-xs text-slate-400 font-medium">Total Masyarakat</p>
                                    <p class="mt-1 text-xl font-extrabold text-slate-900">{{ number_format($totalUsers) }}</p>
                                </div>
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                                    <svg class="h-4.5 w-4.5 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex items-center justify-between rounded-xl border border-amber-100 bg-amber-50 px-4 py-3.5">
                                <div>
                                    <p class="text-xs text-amber-600 font-medium">Belum Diverifikasi</p>
                                    <p class="mt-1 text-xl font-extrabold text-amber-700">{{ $unverifiedLaporan }}</p>
                                </div>
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-amber-200 text-amber-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="flex items-center justify-between rounded-xl border border-sky-100 bg-sky-50 px-4 py-3.5">
                                <div>
                                    <p class="text-xs text-sky-600 font-medium">Verifikasi Selesai</p>
                                    <p class="mt-1 text-xl font-extrabold text-sky-700">{{ $verifiedReports }}</p>
                                </div>
                                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-sky-200 text-sky-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Distribusi Status Bar Chart --}}
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-base font-bold text-slate-900 mb-4">Distribusi Status</h2>

                        @php
                            $total = max($totalLaporan, 1);
                            $bars = [
                                ['label' => 'Menunggu',  'val' => $pendingLaporan,    'color' => 'bg-amber-400', 'text' => 'text-amber-700'],
                                ['label' => 'Diproses',  'val' => $processingLaporan, 'color' => 'bg-sky-400',   'text' => 'text-sky-700'],
                                ['label' => 'Selesai',   'val' => $completedLaporan,  'color' => 'bg-emerald-500','text' => 'text-emerald-700'],
                            ];
                        @endphp

                        <div class="space-y-3">
                            @foreach($bars as $bar)
                                @php $pct = round($bar['val'] / $total * 100) @endphp
                                <div>
                                    <div class="flex justify-between mb-1">
                                        <span class="text-xs font-medium text-slate-600">{{ $bar['label'] }}</span>
                                        <span class="text-xs font-bold {{ $bar['text'] }}">{{ $pct }}%</span>
                                    </div>
                                    <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
                                        <div class="bar-fill h-full rounded-full {{ $bar['color'] }}"
                                             style="width: 0%"
                                             data-target="{{ $pct }}"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>

        </div>
    </div>

    {{-- Scripts --}}
    <script>
        // Count-up animation
        function animateCountUp(el) {
            const target = parseInt(el.dataset.target) || 0;
            const duration = 1000;
            const step = target / (duration / 16);
            let current = 0;
            const timer = setInterval(() => {
                current += step;
                if (current >= target) { current = target; clearInterval(timer); }
                el.textContent = Math.round(current).toLocaleString('id-ID');
            }, 16);
        }

        // Bar chart animation
        function animateBars() {
            document.querySelectorAll('.bar-fill[data-target]').forEach(bar => {
                setTimeout(() => {
                    bar.style.width = bar.dataset.target + '%';
                }, 400);
            });
        }

        // Report filter tabs
        function filterReports(status, btn) {
            document.querySelectorAll('.tab-btn').forEach(t => {
                t.classList.remove('active');
                t.classList.add('text-slate-500');
                t.classList.remove('text-slate-600');
            });
            btn.classList.add('active', 'text-slate-600');
            btn.classList.remove('text-slate-500');

            document.querySelectorAll('#report-list .report-item').forEach(item => {
                if (status === 'all' || item.dataset.status === status) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // Run on load
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.querySelectorAll('.count-up').forEach(animateCountUp);
                animateBars();
            }, 200);
        });
    </script>
</x-app-layout>