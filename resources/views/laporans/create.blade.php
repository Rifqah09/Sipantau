<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Buat Laporan Baru') }}</h2>
                <p class="text-sm text-slate-500">Laporkan masalah lingkungan yang Anda temukan.</p>
            </div>
            <a href="{{ route('laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali ke Laporan Saya
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="judul" class="block text-sm font-semibold text-slate-900 mb-2">Judul Laporan</label>
                        <input id="judul" name="judul" value="{{ old('judul') }}" type="text" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                        @error('judul')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="deskripsi" class="block text-sm font-semibold text-slate-900 mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="5" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="lokasi" class="block text-sm font-semibold text-slate-900 mb-2">Lokasi</label>
                        <input id="lokasi" name="lokasi" value="{{ old('lokasi') }}" type="text" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                        @error('lokasi')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="tanggal" class="block text-sm font-semibold text-slate-900 mb-2">Tanggal Kejadian</label>
                        <input id="tanggal" name="tanggal" value="{{ old('tanggal') }}" type="text" placeholder="YYYY-MM-DD" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900" />
                        @error('tanggal')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label for="latitude" class="block text-sm font-semibold text-slate-900 mb-2">Latitude</label>
                            <input id="latitude" name="latitude" value="{{ old('latitude') }}" type="text" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                            @error('latitude')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="longitude" class="block text-sm font-semibold text-slate-900 mb-2">Longitude</label>
                            <input id="longitude" name="longitude" value="{{ old('longitude') }}" type="text" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                            @error('longitude')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-900 mb-2">Pilih Lokasi di Peta</label>
                        <div id="map-create" class="h-64 w-full rounded-2xl border border-slate-200"></div>
                    </div>

                    <div>
                        <label for="photo" class="block text-sm font-semibold text-slate-900 mb-2">Foto Lampiran</label>
                        <input id="photo" name="photo" type="file" accept="image/*" class="w-full text-slate-700" />
                        @error('photo')<p class="mt-2 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-emerald-700 px-6 py-3 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                        Simpan Laporan
                    </button>
                </form>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#tanggal', { dateFormat: 'Y-m-d' });

            const latInput = document.getElementById('latitude');
            const lngInput = document.getElementById('longitude');
            const initialLat = parseFloat(latInput.value) || -6.200000;
            const initialLng = parseFloat(lngInput.value) || 106.816666;

            const map = L.map('map-create').setView([initialLat, initialLng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            const marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);

            map.on('click', function(e) {
                const { lat, lng } = e.latlng;
                marker.setLatLng(e.latlng);
                latInput.value = lat;
                lngInput.value = lng;
            });

            marker.on('dragend', function(e) {
                const pos = marker.getLatLng();
                latInput.value = pos.lat;
                lngInput.value = pos.lng;
            });
        });
    </script>
</x-app-layout>
