<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Masyarakat | SIPANTAU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <div class="bg-white border-b border-slate-200 px-8 py-5 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Laporan Saya</h1>
                    <p class="text-sm text-slate-600 mt-1">Kelola semua laporan lingkungan Anda di sini</p>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('laporans.index') }}" class="rounded-2xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                        Lihat Laporan Saya
                    </a>
                    <button class="p-2 hover:bg-slate-100 rounded-lg transition">
                        <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <a href="{{ route('profile.edit') }}" title="Edit Profil" class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center hover:bg-emerald-200 transition">
                        <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a9 9 0 00-9 9h18a9 9 0 00-9-9z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Scrollable Content Area -->
            <div class="flex-1 overflow-auto">
                <div class="p-8 grid grid-cols-3 gap-6">
                    <div class="col-span-2 space-y-6">
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
</body>
</html>
