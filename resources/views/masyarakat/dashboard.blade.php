<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard Masyarakat') }}</h2>
                <p class="text-sm text-slate-500">Kelola semua laporan lingkungan Anda di sini.</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-[calc(100vh-5rem)] overflow-auto bg-slate-100">
        <div class="p-4 sm:p-8 space-y-6">
            <section class="relative rounded-[2rem] border border-slate-200 bg-gradient-to-r from-slate-950 via-emerald-700 to-cyan-500 p-8 shadow-xl text-white overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,255,255,0.25),_transparent_35%)]"></div>
                <div class="relative grid gap-6 lg:grid-cols-[1.15fr_1.4fr] lg:items-center">
                    <div class="space-y-4">
                        <p class="text-xs uppercase tracking-[0.32em] text-emerald-200/80 font-semibold">Halo {{ Auth::user()->name }}</p>
                        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Pantau Laporan dan Penanganan Lingkungan</h1>
                        <p class="max-w-2xl text-sm sm:text-base text-slate-100/85 leading-7">Lihat ringkasan laporan Anda, pantau status penanganan, dan terus berkontribusi untuk lingkungan yang lebih bersih.</p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-[1.75rem] border border-white/15 bg-white/10 p-5 backdrop-blur shadow-[0_18px_40px_rgba(15,23,42,0.12)] min-h-[160px] flex flex-col justify-between">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-200">Total Laporan</p>
                                <div class="rounded-2xl bg-white/10 p-2.5 text-white/90 ring-1 ring-white/10">
                                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-4xl font-black leading-none tracking-tight">{{ $laporans->count() }}</p>
                                <p class="text-xs leading-5 text-slate-200/80">Semua laporan yang pernah Anda kirim</p>
                            </div>
                        </div>
                        <div class="rounded-[1.75rem] border border-white/15 bg-white/10 p-5 backdrop-blur shadow-[0_18px_40px_rgba(15,23,42,0.12)] min-h-[160px] flex flex-col justify-between">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-200">Diproses</p>
                                <div class="rounded-2xl bg-sky-500/20 p-2.5 text-sky-50 ring-1 ring-white/10">
                                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-4xl font-black leading-none tracking-tight">{{ $laporans->where('status', 'diproses')->count() }}</p>
                                <p class="text-xs leading-5 text-slate-200/80">Menunggu penanganan petugas</p>
                            </div>
                        </div>
                        <div class="rounded-[1.75rem] border border-white/15 bg-white/10 p-5 backdrop-blur shadow-[0_18px_40px_rgba(15,23,42,0.12)] min-h-[160px] flex flex-col justify-between">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-200">Selesai</p>
                                <div class="rounded-2xl bg-emerald-500/20 p-2.5 text-emerald-50 ring-1 ring-white/10">
                                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-4xl font-black leading-none tracking-tight">{{ $laporans->where('status', 'selesai')->count() }}</p>
                                <p class="text-xs leading-5 text-slate-200/80">Laporan yang sudah ditutup petugas</p>
                            </div>
                        </div>
                        <div class="rounded-[1.75rem] border border-white/15 bg-white/10 p-5 backdrop-blur shadow-[0_18px_40px_rgba(15,23,42,0.12)] min-h-[160px] flex flex-col justify-between">
                            <div class="flex items-center justify-between gap-3">
                                <p class="text-[11px] font-semibold uppercase tracking-[0.35em] text-slate-200">Waktu Eksekusi</p>
                                <div class="rounded-2xl bg-violet-500/20 p-2.5 text-violet-50 ring-1 ring-white/10">
                                    <svg class="h-4.5 w-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m4-3a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <p class="text-4xl font-black leading-none tracking-tight">{{ $averageExecutionLabel }}</p>
                                <p class="text-xs leading-5 text-slate-200/80">Dihitung dari laporan dibuat sampai update petugas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="grid grid-cols-1 xl:grid-cols-[2fr_1fr] gap-6">
                <div class="space-y-6">
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <h2 class="text-xl font-semibold text-slate-900">Laporan Saya</h2>
                                    <p class="text-sm text-slate-500 mt-1">Lihat status terbaru dan detail laporan yang sudah dikirim.</p>
                                </div>
                                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700 ring-1 ring-slate-200">{{ $laporans->count() }} laporan</span>
                            </div>
                        </div>

                        @forelse($laporans as $laporan)
                            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                                <div class="flex flex-col gap-5">
                                    <div class="flex flex-wrap items-center justify-between gap-3">
                                        <div class="flex items-center gap-3">
                                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-slate-100 text-slate-600 ring-1 ring-slate-200">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </span>
                                            <div>
                                                <h3 class="text-lg font-semibold text-slate-900">{{ $laporan->judul }}</h3>
                                                <p class="text-sm text-slate-500 mt-0.5">{{ $laporan->created_at->translatedFormat('d M Y') }} · {{ $laporan->lokasi }}</p>
                                            </div>
                                        </div>
                                        <span class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-slate-600 ring-1 ring-slate-200">{{ ucfirst($laporan->status) }}</span>
                                    </div>

                                    <p class="text-sm leading-6 text-slate-600">{{ Str::limit($laporan->deskripsi, 180) }}</p>

                                    <div class="flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 pt-4">
                                        <div class="flex items-center gap-2 text-xs text-slate-500">
                                            @if($laporan->verifikasiLaporans->isNotEmpty())
                                                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1 font-semibold text-emerald-700 ring-1 ring-emerald-100">Verifikasi: {{ ucfirst($laporan->verifikasiLaporans->last()->status) }}</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-amber-50 px-3 py-1 font-semibold text-amber-700 ring-1 ring-amber-100">Belum diverifikasi</span>
                                            @endif
                                        </div>
                                        <a href="{{ route('laporans.show', $laporan) }}" class="inline-flex items-center rounded-2xl bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-800">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-12 text-center text-slate-600 shadow-sm">
                                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-900 mb-2">Belum ada laporan</h3>
                                <p class="text-sm text-slate-600">Gunakan form di samping untuk membuat laporan baru.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="col-span-1">
                        @include('partials.report-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const fileInput = document.getElementById('photo');
        const dropZone = fileInput?.parentElement?.parentElement;

        if (dropZone) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, () => {
                    dropZone.classList.add('border-emerald-500', 'bg-emerald-50');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, () => {
                    dropZone.classList.remove('border-emerald-500', 'bg-emerald-50');
                });
            });

            dropZone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                fileInput.files = files;
            });
        }
    </script>
</x-app-layout>
