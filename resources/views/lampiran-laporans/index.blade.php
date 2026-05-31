<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Lampiran Laporan') }}</h2>
                <p class="text-sm text-slate-500">Daftar lampiran yang terkait laporan masyarakat.</p>
            </div>
            <a href="{{ route('lampiran-laporans.create') }}" class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">Unggah Lampiran</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-4">
                @forelse($lampiranLaporans as $lampiran)
                    <div class="rounded-3xl bg-white p-6 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-1 border border-slate-200">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">{{ Str::limit($lampiran->laporan->judul, 80) }}</h3>
                                <p class="text-sm text-slate-600 mt-1">{{ $lampiran->created_at->translatedFormat('d M Y H:i') }}</p>
                                <p class="mt-3 text-sm text-slate-600">{{ $lampiran->file_type }}</p>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <a href="{{ route('lampiran-laporans.show', $lampiran) }}" class="rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-emerald-700 border border-emerald-100 hover:bg-emerald-50 transition">Lihat</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-12 text-center text-slate-600 shadow-sm">
                        Belum ada lampiran.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
