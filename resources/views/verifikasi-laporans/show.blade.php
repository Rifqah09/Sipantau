<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Detail Verifikasi') }}</h2>
                <p class="text-sm text-slate-500">Detail hasil verifikasi laporan dan informasi admin.</p>
            </div>
            <a href="{{ route('verifikasi-laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali ke Daftar
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm space-y-6">
                <div class="space-y-2">
                    <h3 class="text-2xl font-semibold text-slate-900">{{ $verifikasiLaporan->laporan->judul }}</h3>
                    <p class="text-sm text-slate-500">Diverifikasi oleh {{ $verifikasiLaporan->admin->name }} pada {{ $verifikasiLaporan->created_at->translatedFormat('d M Y H:i') }}</p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">Status Verifikasi</p>
                        <p class="mt-2 text-lg font-semibold {{ $verifikasiLaporan->status === 'diterima' ? 'text-emerald-700' : 'text-rose-700' }}">{{ ucfirst($verifikasiLaporan->status) }}</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">Status Laporan</p>
                        <p class="mt-2 text-lg font-semibold text-slate-900">{{ ucfirst($verifikasiLaporan->laporan->status) }}</p>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-4">
                    <h4 class="text-sm font-semibold text-slate-900">Catatan Verifikasi</h4>
                    <p class="mt-2 text-sm text-slate-600">{{ $verifikasiLaporan->catatan ?? 'Tidak ada catatan tambahan.' }}</p>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4">
                    <h4 class="text-sm font-semibold text-slate-900">Rincian Laporan</h4>
                    <p class="mt-2 text-sm text-slate-600">{{ $verifikasiLaporan->laporan->deskripsi }}</p>
                    <p class="mt-3 text-sm text-slate-500">Lokasi: {{ $verifikasiLaporan->laporan->lokasi }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
