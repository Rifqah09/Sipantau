<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Verifikasi Laporan') }}</h2>
                <p class="text-sm text-slate-500">Kelola laporan yang telah diajukan masyarakat dan putuskan apakah diterima atau ditolak.</p>
            </div>
            <a href="{{ route('verifikasi-laporans.create') }}" class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                Buat Verifikasi Baru
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 space-y-6">
            @if(session('success'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-slate-900">Laporan Menunggu Verifikasi</h3>

                @if($pendingLaporans->isEmpty())
                    <div class="mt-6 rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-10 text-center text-slate-600">
                        Tidak ada laporan yang menunggu verifikasi.
                    </div>
                @else
                    <div class="mt-6 space-y-4">
                        @foreach($pendingLaporans as $laporan)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                                    <div>
                                        <h4 class="text-lg font-semibold text-slate-900">{{ $laporan->judul }}</h4>
                                        <p class="mt-2 text-sm text-slate-600">{{ Str::limit($laporan->deskripsi, 140) }}</p>
                                        <p class="mt-3 text-sm text-slate-500">{{ $laporan->lokasi }} • oleh {{ $laporan->user->name }}</p>
                                    </div>
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('laporans.show', $laporan) }}" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition">Lihat Laporan</a>
                                        <a href="{{ route('verifikasi-laporans.create', ['laporan_id' => $laporan->id]) }}" class="rounded-2xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">Verifikasi</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Riwayat Verifikasi</h3>
                    <span class="text-sm text-slate-500">{{ $verifikasiLaporans->count() }} entri</span>
                </div>

                @if($verifikasiLaporans->isEmpty())
                    <div class="mt-6 rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-10 text-center text-slate-600">
                        Belum ada data verifikasi.
                    </div>
                @else
                    <div class="mt-6 space-y-4">
                        @foreach($verifikasiLaporans as $verifikasi)
                            <div class="rounded-3xl border border-slate-200 bg-slate-50 p-5">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                    <div>
                                        <h4 class="text-sm font-semibold text-slate-900">{{ $verifikasi->laporan->judul }}</h4>
                                        <p class="mt-1 text-sm text-slate-500">{{ $verifikasi->laporan->user->name }} • {{ $verifikasi->created_at->translatedFormat('d M Y H:i') }}</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $verifikasi->status === 'diterima' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">{{ ucfirst($verifikasi->status) }}</span>
                                        <a href="{{ route('verifikasi-laporans.show', $verifikasi) }}" class="rounded-2xl bg-white px-3 py-2 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-100 transition">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
