<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tanggapi Laporan') }}</h2>
                <p class="text-sm text-slate-500">Isi hasil penanganan dan unggah bukti jika tersedia.</p>
            </div>
            <a href="{{ url()->previous() ?: route('petugas.dashboard') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('tanggapans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="laporan_id" class="block text-sm font-semibold text-slate-900 mb-2">Pilih Laporan</label>
                        <select id="laporan_id" name="laporan_id" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" required>
                            <option value="">Pilih laporan yang sedang diproses</option>
                            @foreach($laporans as $laporan)
                                <option value="{{ $laporan->id }}" {{ old('laporan_id', request('laporan_id')) == $laporan->id ? 'selected' : '' }}>{{ $laporan->judul }} — {{ $laporan->lokasi }}</option>
                            @endforeach
                        </select>
                        @error('laporan_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="isi_tanggapan" class="block text-sm font-semibold text-slate-900 mb-2">Catatan Penanganan</label>
                        <textarea id="isi_tanggapan" name="isi_tanggapan" rows="5" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">{{ old('isi_tanggapan') }}</textarea>
                        @error('isi_tanggapan')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="foto_bukti" class="block text-sm font-semibold text-slate-900 mb-2">Foto Bukti (opsional)</label>
                        <input id="foto_bukti" name="foto_bukti" type="file" accept="image/*" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                        @error('foto_bukti')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-700 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                        Simpan Tanggapan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
