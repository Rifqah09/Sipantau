<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Peta | SIPANTAU</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-o9N1j7QZjY2WEXfDYxVROUVG8qd0P6ND1Z9Mw5LC+9Y=" crossorigin="" />
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "on-primary-fixed-variant": "#005236",
                            "surface-container-low": "#f0f3ff",
                            "on-tertiary-fixed-variant": "#842225",
                            "inverse-on-surface": "#ebf1ff",
                            "surface-container": "#e7eefe",
                            "secondary-fixed-dim": "#b7c4ff",
                            "on-error-container": "#93000a",
                            "on-tertiary-container": "#711419",
                            "surface-variant": "#dce2f3",
                            "outline-variant": "#bbcabf",
                            "secondary": "#1d4ed8",
                            "on-secondary-fixed": "#001551",
                            "surface-container-lowest": "#ffffff",
                            "on-secondary-fixed-variant": "#0039b5",
                            "tertiary-fixed-dim": "#ffb3af",
                            "on-surface": "#151c27",
                            "primary": "#006c49",
                            "error": "#ba1a1a",
                            "primary-fixed-dim": "#4edea3",
                            "primary-fixed": "#6ffbbe",
                            "on-primary": "#ffffff",
                            "surface-container-high": "#e2e8f8",
                            "inverse-surface": "#2a313d",
                            "tertiary-fixed": "#ffdad7",
                            "secondary-container": "#4069f2",
                            "on-tertiary": "#ffffff",
                            "tertiary": "#a43a3a",
                            "tertiary-container": "#fc7c78",
                            "outline": "#6c7a71",
                            "on-surface-variant": "#3c4a42",
                            "on-background": "#151c27",
                            "background": "#f9f9ff",
                            "surface-container-highest": "#dce2f3",
                            "inverse-primary": "#4edea3",
                            "surface-tint": "#006c49",
                            "surface": "#f9f9ff",
                            "secondary-fixed": "#dce1ff",
                            "surface-dim": "#d3daea",
                            "on-primary-container": "#00422b",
                            "on-secondary": "#ffffff",
                            "surface-bright": "#f9f9ff",
                            "on-error": "#ffffff",
                            "on-tertiary-fixed": "#410005",
                            "on-secondary-container": "#fffbff",
                            "primary-container": "#10b981",
                            "error-container": "#ffdad6",
                            "on-primary-fixed": "#002113"
                        },
                        "fontFamily": {
                            "headline": ["Inter"],
                            "display": ["Inter"],
                            "body": ["Inter"],
                            "label": ["Inter"]
                        }
                    }
                }
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            #map {
                min-height: 520px;
            }
        </style>
    </head>
    <body class="bg-slate-100 text-slate-900 antialiased">
        <div class="min-h-screen">
            <!-- Top Navigation Bar -->
            <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-outline-variant px-4 lg:px-8 py-4">
                <div class="mx-auto flex flex-col gap-4 md:flex-row md:items-center md:justify-between md:gap-6">
                    <div class="flex flex-col gap-3 md:flex-row md:items-center md:gap-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-2xl" style="font-variation-settings: 'FILL' 1;">eco</span>
                            <span class="text-xl font-black text-primary tracking-tight">SIPANTAU</span>
                        </div>
                        <nav class="flex flex-wrap gap-3 items-center text-sm md:gap-5">
                            <a class="font-semibold transition-colors {{ request()->url() === url('/') ? 'text-primary' : 'text-on-surface hover:text-primary' }}" href="{{ url('/') }}">Beranda</a>
                            <a class="font-semibold transition-colors {{ request()->routeIs('peta') ? 'text-primary' : 'text-on-surface hover:text-primary' }}" href="{{ route('peta') }}">Peta</a>
                        </nav>
                    </div>
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
