<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard Petugas') }}</h2>
                <p class="text-sm text-slate-500">Kelola semua Tugas lingkungan Anda di sini.</p>
            </div>
        </div>
    </x-slot>

    <div class="flex-1 flex flex-col overflow-hidden bg-slate-50">
            <div class="flex-1 overflow-auto">
                <div class="p-8 space-y-6">
                    <div class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">
                        <div class="space-y-2">                            
                            <h1 class="text-4xl font-bold text-slate-900">Tugas Hari Ini</h1>
                            <p class="max-w-2xl text-slate-600">Daftar penugasan kebersihan area. Kelola tugas yang sedang berjalan dan update status setiap laporan.</p>
                        </div>
                        <div class="inline-flex items-center gap-3 rounded-3xl border border-slate-200 bg-white px-5 py-3 shadow-sm">
                            <div class="rounded-2xl bg-slate-100 px-3 py-2 text-slate-700 text-xs font-semibold uppercase tracking-[0.2em]">Tanggal</div>
                            <div class="text-right">
                                <p class="text-sm text-slate-500">{{ now()->translatedFormat('d M Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-6 xl:grid-cols-3">
                        @forelse($laporans as $laporan)
                            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                                <div class="flex items-center justify-between gap-4">
                                    <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-700">Sedang Dikerjakan</span>
                                    <span class="text-xs text-slate-500">ID: #{{ $laporan->id }}</span>
                                </div>
                                <h2 class="mt-4 text-xl font-semibold text-slate-900">{{ Str::limit($laporan->judul, 40) }}</h2>
                                <p class="mt-3 text-sm leading-6 text-slate-600">{{ Str::limit($laporan->deskripsi, 120) }}</p>
                                <div class="mt-5 flex items-center gap-2 text-slate-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12.414M6.343 6.343l4.243 4.243M9 11.5a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z" />
                                    </svg>
                                    <span>{{ $laporan->lokasi }}</span>
                                </div>
                                <div class="mt-6 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">{{ strtoupper(substr($laporan->user->name, 0, 2)) }}</div>
                                        <div>
                                            <p class="text-sm font-semibold text-slate-900">{{ $laporan->user->name }}</p>
                                            <p class="text-xs text-slate-500">Pelapor</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('laporans.show', $laporan) }}" class="rounded-2xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">Tangani</a>
                                </div>
                            </div>
                        @empty
                            <div class="rounded-3xl border border-slate-200 bg-white p-12 text-center text-slate-600 shadow-sm col-span-3">
                                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-900 mb-2">Tidak ada tugas</h3>
                                <p class="text-sm text-slate-600">Semua laporan sudah ditangani atau belum diverifikasi.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
