<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Detail Lampiran') }}</h2>
                <p class="text-sm text-slate-500">Pratinjau file lampiran.</p>
            </div>
            <a href="{{ route('lampiran-laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">Kembali</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <h3 class="text-2xl font-semibold text-slate-900">{{ $lampiranLaporan->laporan->judul }}</h3>
                <p class="text-sm text-slate-500">Diunggah pada {{ $lampiranLaporan->created_at->translatedFormat('d M Y H:i') }}</p>

                <div class="mt-6">
                    <img src="{{ Storage::url($lampiranLaporan->file_path) }}" alt="Lampiran" class="w-full rounded-3xl object-cover h-96" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
