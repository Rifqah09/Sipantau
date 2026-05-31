<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Laporan') }}</h2>
                <p class="text-sm text-slate-500">Perbarui informasi laporan Anda.</p>
            </div>
            <a href="{{ route('laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali ke Laporan Saya
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('laporans.update', $laporan) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label for="judul" class="block text-sm font-semibold text-slate-900 mb-2">Judul Laporan</label>
                        <input id="judul" name="judul" value="{{ old('judul', $laporan->judul) }}" type="text" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                        @error('judul')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-slate-900 mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">{{ old('deskripsi', $laporan->deskripsi) }}</textarea>
                        @error('deskripsi')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-semibold text-slate-900 mb-2">Lokasi</label>
                        <input id="lokasi" name="lokasi" value="{{ old('lokasi', $laporan->lokasi) }}" type="text" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                        @error('lokasi')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="latitude" class="block text-sm font-semibold text-slate-900 mb-2">Latitude</label>
                            <input id="latitude" name="latitude" value="{{ old('latitude', $laporan->latitude) }}" type="text" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                            @error('latitude')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="longitude" class="block text-sm font-semibold text-slate-900 mb-2">Longitude</label>
                            <input id="longitude" name="longitude" value="{{ old('longitude', $laporan->longitude) }}" type="text" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                            @error('longitude')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    @if(auth()->user()->isAdmin())
                        <div>
                            <label for="status" class="block text-sm font-semibold text-slate-900 mb-2">Status</label>
                            <select id="status" name="status" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">
                                <option value="menunggu" {{ old('status', $laporan->status) === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="diproses" {{ old('status', $laporan->status) === 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ old('status', $laporan->status) === 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                            @error('status')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>
                    @endif

                    <div>
                        <label for="photo" class="block text-sm font-semibold text-slate-900 mb-2">Unggah Foto Baru</label>
                        <input id="photo" name="photo" type="file" accept="image/*" class="w-full text-slate-700" />
                        @error('photo')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-700 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                        Perbarui Laporan
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
