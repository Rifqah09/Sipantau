<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Lampiran') }}</h2>
                <p class="text-sm text-slate-500">Perbarui lampiran laporan jika diperlukan.</p>
            </div>
            <a href="{{ route('lampiran-laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">Kembali</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('lampiran-laporans.update', $lampiranLaporan) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="laporan_id" class="block text-sm font-semibold text-slate-900 mb-2">Pilih Laporan</label>
                        <select id="laporan_id" name="laporan_id" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">
                            @foreach($laporans as $laporan)
                                <option value="{{ $laporan->id }}" {{ old('laporan_id', $lampiranLaporan->laporan_id) == $laporan->id ? 'selected' : '' }}>{{ $laporan->judul }} — {{ $laporan->lokasi }}</option>
                            @endforeach
                        </select>
                        @error('laporan_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="photo" class="block text-sm font-semibold text-slate-900 mb-2">Unggah File Baru (opsional)</label>
                        <input id="photo" name="photo" type="file" accept="image/*" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900" />
                        @error('photo')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-700 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-800 transition">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
