<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard Admin') }}</h2>
                <p class="text-sm text-slate-500">Ringkasan laporan, verifikasi, dan aktivitas masyarakat.</p>
            </div>
        </div>
    </x-slot>

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
</x-app-layout>
