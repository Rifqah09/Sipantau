<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Verifikasi Laporan') }}</h2>
                <p class="text-sm text-slate-500">Tentukan apakah laporan bisa diproses lebih lanjut atau ditolak.</p>
            </div>
            <a href="{{ route('verifikasi-laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali ke Daftar Verifikasi
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                @if($laporans->isEmpty())
                    <div class="rounded-3xl border border-dashed border-slate-200 bg-slate-50 p-10 text-center text-slate-600">
                        Tidak ada laporan yang perlu diverifikasi.
                    </div>
                @else
                    <form action="{{ route('verifikasi-laporans.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div>
                            <label for="laporan_id" class="block text-sm font-semibold text-slate-900 mb-2">Pilih Laporan</label>
                            <select id="laporan_id" name="laporan_id" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">
                                <option value="">Pilih laporan yang akan diverifikasi</option>
                                @foreach($laporans as $laporan)
                                    <option value="{{ $laporan->id }}" {{ old('laporan_id', $laporanId) == $laporan->id ? 'selected' : '' }}>{{ $laporan->judul }} — {{ $laporan->user->name }}</option>
                                @endforeach
                            </select>
                            @error('laporan_id')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-900 mb-2">Hasil Verifikasi</label>
                            <div class="grid gap-3 sm:grid-cols-2">
                                <label class="flex items-center gap-3 rounded-2xl border border-slate-300 bg-white px-4 py-3 cursor-pointer">
                                    <input type="radio" name="status" value="diterima" {{ old('status') === 'diterima' ? 'checked' : '' }} class="h-4 w-4 text-emerald-700" />
                                    <span class="text-sm text-slate-700">Diterima</span>
                                </label>
                                <label class="flex items-center gap-3 rounded-2xl border border-slate-300 bg-white px-4 py-3 cursor-pointer">
                                    <input type="radio" name="status" value="ditolak" {{ old('status') === 'ditolak' ? 'checked' : '' }} class="h-4 w-4 text-rose-700" />
                                    <span class="text-sm text-slate-700">Ditolak</span>
                                </label>
                            </div>
                            @error('status')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="catatan" class="block text-sm font-semibold text-slate-900 mb-2">Catatan Tambahan</label>
                            <textarea id="catatan" name="catatan" rows="4" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">{{ old('catatan') }}</textarea>
                            @error('catatan')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-700 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                            Simpan Verifikasi
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
