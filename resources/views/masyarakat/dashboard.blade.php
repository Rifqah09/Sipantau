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
                <div class="relative grid gap-6 lg:grid-cols-[2fr_1fr] lg:items-center">
                    <div class="space-y-4">
                        <p class="text-xs uppercase tracking-[0.32em] text-emerald-200/80 font-semibold">Halo {{ Auth::user()->name }}</p>
                        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Pantau Laporan dan Penanganan Lingkungan</h1>
                        <p class="max-w-2xl text-sm sm:text-base text-slate-100/85 leading-7">Lihat ringkasan laporan Anda, pantau status penanganan, dan terus berkontribusi untuk lingkungan yang lebih bersih.</p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-3">
                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                            <p class="text-[11px] uppercase tracking-[0.32em] text-slate-200">Total Laporan</p>
                            <p class="mt-4 text-3xl font-bold">{{ $laporans->count() }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                            <p class="text-[11px] uppercase tracking-[0.32em] text-slate-200">Diproses</p>
                            <p class="mt-4 text-3xl font-bold">{{ $laporans->where('status', 'diproses')->count() }}</p>
                        </div>
                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                            <p class="text-[11px] uppercase tracking-[0.32em] text-slate-200">Selesai</p>
                            <p class="mt-4 text-3xl font-bold">{{ $laporans->where('status', 'selesai')->count() }}</p>
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
                                <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700">{{ $laporans->count() }} laporan</span>
                            </div>
                        </div>

                        @forelse($laporans as $laporan)
                            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                                <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                                    <div>
                                        <div class="flex flex-wrap items-center gap-2 text-sm text-slate-500">
                                            <span class="inline-flex rounded-full bg-slate-100 px-3 py-1">{{ ucfirst($laporan->status) }}</span>
                                            <span>{{ $laporan->created_at->translatedFormat('d M Y') }}</span>
                                        </div>
                                        <h3 class="mt-4 text-2xl font-semibold text-slate-900">{{ $laporan->judul }}</h3>
                                        <p class="mt-2 text-sm leading-6 text-slate-600">{{ Str::limit($laporan->deskripsi, 180) }}</p>
                                        <p class="mt-3 text-sm text-slate-500">Lokasi: {{ $laporan->lokasi }}</p>
                                    </div>
                                    <div class="flex flex-col gap-3 items-start lg:items-end">
                                        @if($laporan->verifikasiLaporans->isNotEmpty())
                                            <span class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-500">Verifikasi: {{ ucfirst($laporan->verifikasiLaporans->last()->status) }}</span>
                                        @endif
                                        <a href="{{ route('laporans.show', $laporan) }}" class="rounded-2xl bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-100 transition">Detail</a>
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
