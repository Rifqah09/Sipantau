<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peta | SIPANTAU</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-o9N1j7QZjY2WEXfDYxVROUVG8qd0P6ND1Z9Mw5LC+9Y=" crossorigin="" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            #map {
                min-height: 520px;
            }
        </style>
    </head>
    <body class="bg-slate-100 text-slate-900 antialiased">
        <div class="min-h-screen">
            <header class="border-b border-slate-200 bg-white/90 backdrop-blur-xl">
                <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3">
                        <div class="rounded-2xl bg-emerald-900/10 px-3 py-2 text-emerald-800 font-semibold tracking-[0.08em]">
                            SIPANTAU
                        </div>
                        <nav class="hidden items-center gap-8 text-sm font-medium text-slate-700 lg:flex">
                            <a href="/" class="transition hover:text-emerald-700">Beranda</a>
                            <a href="/peta" class="text-emerald-700">Peta</a>
                            <a href="/" class="transition hover:text-emerald-700">Lapor</a>
                        </nav>
                    </div>
                    <a href="/" class="inline-flex items-center justify-center rounded-2xl border border-slate-300/90 bg-white px-4 py-3 text-sm font-semibold text-slate-700 shadow-sm transition hover:border-emerald-300 hover:text-emerald-700">
                        Kembali ke Beranda
                    </a>
                </div>
            </header>

            <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
                <div class="rounded-[2rem] border border-slate-200 bg-white shadow-xl shadow-slate-900/5">
                    <div class="flex flex-col gap-8 p-8 xl:flex-row xl:items-center xl:justify-between xl:p-10">
                        <div class="max-w-3xl">
                            <p class="text-sm font-semibold uppercase tracking-[0.32em] text-emerald-700">Monitoring & Evaluasi Kinerja</p>
                            <h1 class="mt-4 text-3xl font-semibold tracking-tight text-slate-950 sm:text-4xl">Gambaran umum operasi kebersihan kota dan respons petugas.</h1>
                        </div>
                        <div class="flex flex-col gap-3 sm:flex-row">
                            <button class="inline-flex items-center justify-center rounded-2xl bg-emerald-700 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-800">
                                Hari Ini
                            </button>
                            <button class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:bg-slate-50">
                                7 Hari Terakhir
                            </button>
                        </div>
                    </div>

                    <div class="grid gap-6 px-6 pb-8 sm:grid-cols-[2fr_1fr] lg:px-10 xl:grid-cols-[2.5fr_1fr]">
                        <div class="rounded-[2rem] bg-slate-950 p-6 shadow-xl shadow-slate-900/10 sm:p-8">
                            <div class="flex items-center justify-between gap-4 text-white">
                                <div>
                                    <p class="text-sm font-medium uppercase tracking-[0.32em] text-slate-200">Peta Sebaran Laporan</p>
                                </div>
                                <div class="inline-flex items-center gap-1 rounded-full bg-white/10 px-4 py-2 text-xs font-semibold text-slate-100 ring-1 ring-white/10">
                                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                                    Aktif
                                </div>
                            </div>
                            <div id="map" class="mt-6 overflow-hidden rounded-[2rem] border border-white/10 bg-slate-800"></div>
                        </div>

                        <div class="grid gap-6">
                            <div class="rounded-[2rem] bg-white p-6 shadow-sm shadow-slate-900/5 ring-1 ring-slate-200/70">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Rata-rata Waktu Respons</p>
                                        <p class="mt-4 text-3xl font-semibold text-slate-950">45</p>
                                    </div>
                                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-emerald-100 text-emerald-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l2 2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
                                        </svg>
                                    </div>
                                </div>
                                <p class="mt-4 text-sm text-emerald-600">-12% dari bulan lalu</p>
                            </div>

                            <div class="rounded-[2rem] bg-white p-6 shadow-sm shadow-slate-900/5 ring-1 ring-slate-200/70">
                                <div class="flex items-center justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-500">Area Kritis (Hotspot)</p>
                                        <p class="mt-4 text-3xl font-semibold text-slate-950">{{ $hotspots->count() }}</p>
                                    </div>
                                    <div class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-red-100 text-red-700">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c4.97 0 9-4.03 9-9s-4.03-9-9-9-9 4.03-9 9 4.03 9 9 9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7v5" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 15h.01" />
                                        </svg>
                                    </div>
                                </div>
                                @foreach ($hotspots as $hotspot)
                                    <div class="mt-4 flex items-center justify-between gap-4 text-sm text-slate-500">
                                        <span>{{ $hotspot['lokasi'] }}</span>
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">Tinggi</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <section class="mt-10 rounded-[2rem] bg-white p-6 shadow-xl shadow-slate-900/5 ring-1 ring-slate-200/70 sm:p-8">
                    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.32em] text-emerald-700">Evaluasi Laporan Bulanan</p>
                            <h2 class="mt-3 text-2xl font-semibold text-slate-950 sm:text-3xl">Daftar laporan terverifikasi bulan ini.</h2>
                        </div>
                        <button class="inline-flex items-center justify-center rounded-2xl bg-slate-950 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-800">
                            Ekspor Data
                        </button>
                    </div>

                    <div class="mt-8 overflow-hidden rounded-[2rem] border border-slate-200">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-slate-50 text-slate-700">
                                <tr>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-[0.16em]">ID Laporan</th>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-[0.16em]">Kategori</th>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-[0.16em]">Lokasi</th>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-[0.16em]">Waktu Selesai</th>
                                    <th class="px-6 py-4 font-semibold uppercase tracking-[0.16em]">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @foreach ($laporans as $laporan)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-6 py-4 font-medium text-slate-900">#LP-{{ str_pad($laporan->id, 3, '0', STR_PAD_LEFT) }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $laporan->judul }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $laporan->lokasi }}</td>
                                        <td class="px-6 py-4 text-slate-600">{{ $laporan->status === 'selesai' ? '45 Menit' : ($laporan->status === 'diproses' ? '1 Jam 20 Menit' : '-') }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $statusClasses = [
                                                    'menunggu' => 'bg-red-100 text-red-700',
                                                    'diproses' => 'bg-amber-100 text-amber-700',
                                                    'selesai' => 'bg-emerald-100 text-emerald-700',
                                                ];
                                            @endphp
                                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $statusClasses[$laporan->status] ?? 'bg-slate-100 text-slate-700' }}">
                                                {{ ucfirst($laporan->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </main>
        </div>

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-o9N1j7QZjY2WEXfDYxVROUVG8qd0P6ND1Z9Mw5LC+9Y=" crossorigin=""></script>
        <script>
            const laporans = @json($mapMarkers);
            const defaultCenter = laporans.length ? [laporans[0].latitude, laporans[0].longitude] : [-6.200000, 106.816666];
            const map = L.map('map').setView(defaultCenter, 12);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            if (laporans.length === 0) {
                L.marker(defaultCenter).addTo(map).bindPopup('Belum ada lokasi laporan dengan koordinat.');
            }

            laporans.forEach((item) => {
                const popup = `<div style="font-size:0.95rem;"><strong>${item.judul}</strong><br>${item.lokasi}<br>Status: ${item.status}</div>`;
                L.marker([item.latitude, item.longitude]).addTo(map).bindPopup(popup);
            });
        </script>
    </body>
</html>
