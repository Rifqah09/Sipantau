<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Daftar Tanggapan') }}</h2>
                <p class="text-sm text-slate-500">Semua tanggapan yang dibuat oleh petugas.</p>
            </div>
            <a href="{{ route('tanggapans.create') }}" class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">Buat Tanggapan</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-4">
                @forelse($tanggapans as $tanggapan)
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">{{ Str::limit($tanggapan->laporan->judul, 80) }}</h3>
                                <p class="text-sm text-slate-600 mt-1">{{ $tanggapan->created_at->translatedFormat('d M Y H:i') }} • oleh {{ $tanggapan->petugas->name }}</p>
                                <p class="mt-3 text-sm text-slate-600">{{ Str::limit($tanggapan->isi_tanggapan, 200) }}</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <a href="{{ route('tanggapans.show', $tanggapan) }}" class="rounded-2xl bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-100 transition">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-12 text-center text-slate-600 shadow-sm">
                        Belum ada tanggapan.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
