<!DOCTYPE html><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Daftar SIPANTAU - Kontribusi untuk Kota Bersih</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
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
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
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
<main class="w-full flex flex-1">
<!-- Left Side: Visual Inspiration -->
<section class="hidden lg:flex lg:w-1/2 relative items-center justify-center overflow-hidden">
<div class="absolute inset-0 z-0">
<img alt="Clean Urban Environment" class="w-full h-full object-cover" data-alt="A wide-angle landscape shot of a modern, clean, and futuristic eco-city with lush vertical gardens integrated into sleek white architecture. The scene is bathed in natural, bright daylight with a clear blue sky, emphasizing environmental stewardship and urban sustainability. The color palette features vibrant emerald greens, crisp whites, and subtle royal blue accents, reflecting a high-end corporate environmentalist aesthetic. The mood is hopeful, professional, and pristine." src="https://lh3.googleusercontent.com/aida-public/AB6AXuApYrFX5BpUkgqd4Opv4UebxK51-ikXmblqRgCinaduc8zuqToz-8j6NpQZdicfqcW4OybsJBYzjYmjMQol-M83xqGN2CHH9JrsSYOHC1aVm1_Q6tcI598ntpky0KuZZGhbcuK1eIqgzTuErGRTfxtPYZ_c6lLhKNm0l6aLgvWZJ1Wde19oqLP4hzkoGZs_zdIds0OcdpN4ZtQQrsygJs0hd28Q62d52gsMhjjlJx-36sS5p8srRysxNFArIu5Zbd-uA16vDst8YUE">
<div class="absolute inset-0 bg-gradient-to-t from-on-primary-fixed-variant/80 via-transparent to-transparent"></div>
</div>
<div class="relative z-10 p-12 max-w-xl text-center lg:text-left">
<div class="mb-6 inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-4 py-2 rounded-full border border-white/30">
<span class="material-symbols-outlined text-white" style="font-variation-settings: 'FILL' 1;">eco</span>
<span class="text-white font-bold tracking-widest text-sm uppercase">SIPANTAU</span>
</div>
<h1 class="text-5xl font-black text-white leading-tight mb-6 drop-shadow-lg">
                Mari Berkontribusi untuk Kota yang Lebih Bersih
            </h1>
<p class="text-xl text-white/90 font-medium">
                Gabung bersama ribuan warga lainnya untuk menjaga ekosistem kota tetap sehat dan terawat melalui pelaporan cerdas.
            </p>
</div>
</section>
<!-- Right Side: Registration Form -->
<section class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-surface">
<div class="w-full max-w-md">
<div class="mb-10">
<h3 class="text-3xl font-bold text-on-surface mb-2">Buat Akun Baru</h3>
<p class="text-on-surface-variant">Lengkapi data diri Anda untuk mulai berkontribusi.</p>
</div>
<form method="POST" action="{{ route('register') }}" class="space-y-5">
@csrf
<!-- Full Name -->
<div class="space-y-1.5">
<label class="block text-sm font-bold text-on-surface-variant" for="name">Nama Lengkap</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">person</span>
<input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none" id="name" name="name" placeholder="Contoh: Ika Rifqah" type="text" value="{{ old('name') }}" required autofocus>
</div>
@error('name')
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
</div>
<!-- Email -->
<div class="space-y-1.5">
<label class="block text-sm font-bold text-on-surface-variant" for="email">Alamat Email</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">mail</span>
<input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none" id="email" name="email" placeholder="ikaikka@email.com" type="email" value="{{ old('email') }}" required>
</div>
@error('email')
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
</div>
<!-- Phone Number -->
<div class="space-y-1.5">
<label class="block text-sm font-bold text-on-surface-variant" for="phone">Nomor WhatsApp</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">call</span>
<input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none" id="phone" name="phone" placeholder="0812xxxx" type="tel" value="{{ old('phone') }}" required>
</div>
@error('phone')
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
</div>
<!-- Password -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="space-y-1.5">
<label class="block text-sm font-bold text-on-surface-variant" for="password">Kata Sandi</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
<input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none" id="password" name="password" placeholder="••••••••" type="password" required>
</div>
@error('password')
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
</div>
<div class="space-y-1.5">
<label class="block text-sm font-bold text-on-surface-variant" for="password_confirmation">Konfirmasi</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">verified_user</span>
<input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-secondary focus:border-secondary transition-all outline-none" id="password_confirmation" name="password_confirmation" placeholder="••••••••" type="password" required>
</div>
</div>
</div>
<!-- CTA Buttons -->
<div class="pt-4 space-y-4">
<button class="w-full bg-primary text-white font-bold py-3.5 rounded-lg shadow-md hover:bg-on-primary-fixed-variant active:scale-[0.98] transition-all flex items-center justify-center gap-2" type="submit">
<span class="">Daftar Sekarang</span>
<span class="material-symbols-outlined text-lg">arrow_forward</span>
</button>
<div class="relative flex items-center justify-center">
<div class="w-full border-t border-outline-variant"></div>
<span class="absolute px-4 bg-surface text-xs font-bold text-outline uppercase tracking-widest">Atau</span>
</div>
<button class="w-full bg-white border border-outline-variant text-on-surface font-semibold py-3.5 rounded-lg hover:bg-surface-container-low active:scale-[0.98] transition-all flex items-center justify-center gap-3" type="button">
<svg class="w-5 h-5" viewBox="0 0 48 48">
<path d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" fill="#FFC107"></path>
<path d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" fill="#FF3D00"></path>
<path d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" fill="#4CAF50"></path>
<path d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,24,34C24,22.659,43.862,21.35,43.611,20.083z" fill="#1976D2"></path>
</svg>
<span class="">Daftar dengan Google</span>
</button>
</div>
</form>
<div class="mt-8 text-center">
<p class="text-on-surface-variant font-medium">
                    Sudah punya akun? 
                    <a class="text-secondary font-bold hover:underline transition-all" href="{{ route('login') }}">Masuk di sini</a>
</p>
</div>
<!-- Footer Info -->
<div class="mt-12 text-center text-xs text-outline space-y-1">
<p class="">© 2026 SIPANTAU - Dinas Lingkungan Hidup</p>
<p class="">Membangun Masa Depan yang Lebih Hijau Bersama.</p>
</div>
</div>
</section>
</main>
</body></html>
