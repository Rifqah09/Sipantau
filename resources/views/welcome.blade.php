<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SIPANTAU - Wujudkan Lingkungan Bersih</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "inverse-on-surface": "#ebf1ff",
                        "tertiary": "#a43a3a",
                        "tertiary-container": "#fc7c78",
                        "tertiary-fixed-dim": "#ffb3af",
                        "outline-variant": "#bbcabf",
                        "primary-container": "#10b981",
                        "on-secondary-container": "#fffbff",
                        "secondary-fixed": "#dce1ff",
                        "on-tertiary": "#ffffff",
                        "primary-fixed-dim": "#4edea3",
                        "surface-container": "#e7eefe",
                        "surface-container-lowest": "#ffffff",
                        "surface-tint": "#006c49",
                        "outline": "#6c7a71",
                        "on-secondary-fixed": "#001551",
                        "surface-bright": "#f9f9ff",
                        "on-secondary-fixed-variant": "#0039b5",
                        "surface-variant": "#dce2f3",
                        "on-error": "#ffffff",
                        "on-surface-variant": "#3c4a42",
                        "surface": "#f9f9ff",
                        "error-container": "#ffdad6",
                        "background": "#f9f9ff",
                        "surface-container-high": "#e2e8f8",
                        "on-primary-fixed-variant": "#005236",
                        "on-primary-fixed": "#002113",
                        "on-surface": "#151c27",
                        "on-primary-container": "#00422b",
                        "on-background": "#151c27",
                        "tertiary-fixed": "#ffdad7",
                        "on-primary": "#ffffff",
                        "surface-container-highest": "#dce2f3",
                        "surface-container-low": "#f0f3ff",
                        "error": "#ba1a1a",
                        "inverse-primary": "#4edea3",
                        "on-tertiary-fixed": "#410005",
                        "inverse-surface": "#2a313d",
                        "primary": "#006c49",
                        "primary-fixed": "#6ffbbe",
                        "on-secondary": "#ffffff",
                        "surface-dim": "#d3daea",
                        "on-tertiary-fixed-variant": "#842225",
                        "on-tertiary-container": "#711419",
                        "secondary-container": "#4069f2",
                        "on-error-container": "#93000a",
                        "secondary": "#1d4ed8",
                        "secondary-fixed-dim": "#b7c4ff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Inter", "sans-serif"],
                        "display": ["Inter", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-background text-on-background font-body min-h-screen flex flex-col">
<!-- TopAppBar -->
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
<div class="flex items-center gap-2 md:gap-3">
<a href="{{ route('login') }}" class="px-4 py-2 bg-primary/10 text-primary font-semibold rounded-lg hover:bg-primary/20 transition-colors">Masuk</a>
<a href="{{ route('register') }}" class="px-4 py-2 bg-primary/10 text-primary font-semibold rounded-lg hover:bg-primary/20 transition-colors">Daftar</a>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="flex-grow flex flex-col w-full pb-20 md:pb-0">
<!-- Section 1: Hero -->
<section class="relative w-full overflow-hidden bg-surface-container-low min-h-[716px] flex items-center justify-center py-20 px-6">
<div class="absolute inset-0 z-0">
<img alt="Clean Environment Background" class="w-full h-full object-cover opacity-20" data-alt="A wide angle shot of a clean, lush green city park under a bright blue sky, embodying a pristine urban environment. The sunlight is bright and natural, casting soft shadows over manicured lawns and walking paths. The overall color palette is dominated by vibrant greens and crisp blues, aligning perfectly with a modern eco-friendly aesthetic. The mood is optimistic and refreshing, reflecting a successful community effort in environmental stewardship." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD7feMXAdgsdXQMSbKnZ77sL4AdQKb6Z2Cjc4UTtCc_74Ek_SAXFfpjw-IozE23VC86TnxRtllgHSoAwDSebqPWo2AuZGoQ4IrFH3AM2tbWoEflkUeQVX1l1HQccSLDDoAwCAXpW7RNuOrlow92At81RQE8eRbETUdEBLW8FleXlta8dLY3bD9XFCCD7CRrBXm9JTSAmw5skh8LUA0tbf8z2DvC-sLA1I4dOzA_aEeMrOARfMiZXRQ-DmnDqa_0oCfeJPC_KU-5s3A"/>
</div>
<div class="relative z-10 max-w-4xl mx-auto text-center flex flex-col items-center gap-8">
<div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary-container/30 text-green-900 text-sm font-medium border border-primary/20 backdrop-blur-sm">
<span class="material-symbols-outlined text-sm">eco</span>
                    Aplikasi Pelaporan Lingkungan Resmi
                </div>
<h1 class="font-display font-black text-5xl md:text-7xl tracking-tight text-on-surface leading-tight">
                    Wujudkan Lingkungan Bersih Bersama <span class="text-primary">SIPANTAU</span>
</h1>
<p class="font-body text-xl md:text-2xl text-on-surface-variant max-w-2xl leading-relaxed">
                    Sistem pelaporan cerdas untuk kota yang lebih baik. Laporkan masalah kebersihan di sekitarmu, dan pantau proses penanganannya secara real-time.
                </p>
<div class="flex flex-col sm:flex-row gap-4 mt-4 w-full sm:w-auto">
<a href="{{ route('login') }}" class="px-8 py-4 bg-primary text-on-primary rounded-lg font-bold text-lg hover:bg-on-primary-fixed-variant active:scale-95 transition-all shadow-md flex items-center justify-center gap-2 w-full sm:w-auto">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">add_circle</span>
                        Mulai Lapor
                    </a>
<a href="{{ route('peta') }}" class="px-8 py-4 bg-surface text-secondary border border-secondary rounded-lg font-bold text-lg hover:bg-surface-container-low active:scale-95 transition-all flex items-center justify-center gap-2 w-full sm:w-auto">
<span class="material-symbols-outlined">map</span>
                        Lihat Peta
                    </a>
</div>
</div>
</section>
<!-- Section 2: Public Statistics -->
<section class="py-16 px-6 bg-surface">
<div class="max-w-7xl mx-auto">
<div class="text-center mb-12">
<h2 class="font-headline font-bold text-3xl text-on-surface">Transparansi Penanganan</h2>
<p class="text-on-surface-variant mt-2 font-body">Data laporan terkini dari partisipasi warga</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<!-- Stat Card 1 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex items-center gap-6 shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-fixed">
<span class="material-symbols-outlined text-3xl">description</span>
</div>
<div>
<p class="text-on-surface-variant font-medium text-sm font-label uppercase tracking-wider mb-1">Total Laporan</p>
<h3 class="font-display font-bold text-4xl text-on-surface">12,450</h3>
</div>
</div>
<!-- Stat Card 2 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex items-center gap-6 shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-tertiary-container flex items-center justify-center text-on-tertiary-fixed">
<span class="material-symbols-outlined text-3xl">pending_actions</span>
</div>
<div>
<p class="text-on-surface-variant font-medium text-sm font-label uppercase tracking-wider mb-1">Dalam Proses</p>
<h3 class="font-display font-bold text-4xl text-on-surface">845</h3>
</div>
</div>
<!-- Stat Card 3 -->
<div class="bg-surface-container-lowest border border-outline-variant p-6 rounded-xl flex items-center gap-6 shadow-sm hover:shadow-md transition-shadow">
<div class="w-16 h-16 rounded-full bg-primary-container flex items-center justify-center text-on-primary-fixed">
<span class="material-symbols-outlined text-3xl">task_alt</span>
</div>
<div>
<p class="text-on-surface-variant font-medium text-sm font-label uppercase tracking-wider mb-1">Selesai Ditangani</p>
<h3 class="font-display font-bold text-4xl text-on-surface">11,605</h3>
</div>
</div>
</div>
</div>
</section>
<!-- Section 3: How it Works -->
<section class="py-20 px-6 bg-surface-container-low">
<div class="max-w-7xl mx-auto">
<div class="text-center mb-16">
<h2 class="font-headline font-bold text-3xl text-on-surface">Cara Kerja Sederhana</h2>
<p class="text-on-surface-variant mt-2 font-body max-w-2xl mx-auto">Tiga langkah mudah untuk berkontribusi menjaga kebersihan kota kita bersama.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
<!-- Connector Line (Desktop) -->
<div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-0.5 bg-outline-variant border-t border-dashed border-outline/50 -z-10"></div>
<!-- Step 1 -->
<div class="flex flex-col items-center text-center">
<div class="w-24 h-24 rounded-2xl bg-surface border-2 border-primary flex items-center justify-center shadow-lg mb-6 relative z-10">
<span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 1;">photo_camera</span>
<div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-primary text-on-primary font-bold flex items-center justify-center border-2 border-surface">1</div>
</div>
<h3 class="font-headline font-bold text-xl text-on-surface mb-2">Foto</h3>
<p class="text-on-surface-variant font-body">Temukan tumpukan sampah atau masalah lingkungan, ambil foto dengan jelas menyertakan lokasi sekitar.</p>
</div>
<!-- Step 2 -->
<div class="flex flex-col items-center text-center">
<div class="w-24 h-24 rounded-2xl bg-surface border-2 border-secondary flex items-center justify-center shadow-lg mb-6 relative z-10">
<span class="material-symbols-outlined text-4xl text-secondary" style="font-variation-settings: 'FILL' 1;">send</span>
<div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-secondary text-on-secondary font-bold flex items-center justify-center border-2 border-surface">2</div>
</div>
<h3 class="font-headline font-bold text-xl text-on-surface mb-2">Lapor</h3>
<p class="text-on-surface-variant font-body">Unggah foto melalui aplikasi SIPANTAU, tambahkan deskripsi singkat, dan kirim laporan.</p>
</div>
<!-- Step 3 -->
<div class="flex flex-col items-center text-center">
<div class="w-24 h-24 rounded-2xl bg-surface border-2 border-primary-container flex items-center justify-center shadow-lg mb-6 relative z-10">
<span class="material-symbols-outlined text-4xl text-primary-container" style="font-variation-settings: 'FILL' 1;">eco</span>
<div class="absolute -top-3 -right-3 w-8 h-8 rounded-full bg-primary-container text-on-primary-container font-bold flex items-center justify-center border-2 border-surface">3</div>
</div>
<h3 class="font-headline font-bold text-xl text-on-surface mb-2">Bersih</h3>
<p class="text-on-surface-variant font-body">Petugas akan segera menindaklanjuti. Pantau status laporan hingga area kembali bersih.</p>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="w-full py-8 mt-auto flex flex-col md:flex-row justify-between items-center px-8 max-w-7xl mx-auto bg-surface-container-highest border-t border-outline-variant">
<div class="mb-4 md:mb-0 text-center md:text-left">
<span class="text-md font-headline font-bold text-on-surface block mb-1">SIPANTAU</span>
<span class="font-body text-body-sm text-on-surface-variant">© 2026 SIPANTAU - Dinas Lingkungan Hidup. Menjaga Kebersihan untuk Masa Depan.</span>
</div>
<nav class="flex flex-wrap justify-center gap-4 md:gap-6">
<a class="font-body text-body-sm text-on-surface-variant hover:text-primary hover:underline transition-all opacity-80 hover:opacity-100" href="#">Tentang Kami</a>
<a class="font-body text-body-sm text-on-surface-variant hover:text-primary hover:underline transition-all opacity-80 hover:opacity-100" href="#">Panduan Pelaporan</a>
<a class="font-body text-body-sm text-on-surface-variant hover:text-primary hover:underline transition-all opacity-80 hover:opacity-100" href="#">Kebijakan Privasi</a>
<a class="font-body text-body-sm text-on-surface-variant hover:text-primary hover:underline transition-all opacity-80 hover:opacity-100" href="#">Kontak Darurat</a>
</nav>
</footer>
</body></html>
