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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#tanggal', { dateFormat: 'Y-m-d' });

            let map;
            let marker;
            window.initMap = function() {
                const latInput = document.getElementById('latitude');
                const lngInput = document.getElementById('longitude');
                const initialLat = parseFloat(latInput.value) || -6.200000;
                const initialLng = parseFloat(lngInput.value) || 106.816666;

                map = new google.maps.Map(document.getElementById('map-create'), {
                    center: { lat: initialLat, lng: initialLng },
                    zoom: 13,
                });

                marker = new google.maps.Marker({
                    position: { lat: initialLat, lng: initialLng },
                    map: map,
                    draggable: true,
                });

                map.addListener('click', function(e) {
                    const lat = e.latLng.lat();
                    const lng = e.latLng.lng();
                    marker.setPosition(e.latLng);
                    latInput.value = lat;
                    lngInput.value = lng;
                });

                marker.addListener('dragend', function(e) {
                    latInput.value = e.latLng.lat();
                    lngInput.value = e.latLng.lng();
                });
            };
        });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMap"></script>
</x-app-layout>
