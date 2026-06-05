<!DOCTYPE html><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Masuk - SIPANTAU</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "tertiary-fixed": "#ffdad7",
                    "secondary-container": "#4069f2",
                    "primary-fixed-dim": "#4edea3",
                    "tertiary": "#a43a3a",
                    "surface": "#f9f9ff",
                    "surface-container": "#e7eefe",
                    "primary-container": "#10b981",
                    "on-error": "#ffffff",
                    "surface-container-low": "#f0f3ff",
                    "primary-fixed": "#6ffbbe",
                    "on-tertiary": "#ffffff",
                    "outline": "#6c7a71",
                    "on-tertiary-container": "#711419",
                    "secondary-fixed-dim": "#b7c4ff",
                    "secondary-fixed": "#dce1ff",
                    "error": "#ba1a1a",
                    "tertiary-container": "#fc7c78",
                    "primary": "#006c49",
                    "on-secondary-fixed": "#001551",
                    "on-error-container": "#93000a",
                    "on-primary-container": "#00422b",
                    "surface-variant": "#dce2f3",
                    "on-primary-fixed": "#002113",
                    "on-background": "#151c27",
                    "on-surface": "#151c27",
                    "on-surface-variant": "#3c4a42",
                    "tertiary-fixed-dim": "#ffb3af",
                    "on-tertiary-fixed": "#410005",
                    "inverse-primary": "#4edea3",
                    "outline-variant": "#bbcabf",
                    "surface-dim": "#d3daea",
                    "surface-tint": "#006c49",
                    "secondary": "#1d4ed8",
                    "on-primary-fixed-variant": "#005236",
                    "surface-container-lowest": "#ffffff",
                    "on-primary": "#ffffff",
                    "on-secondary-container": "#fffbff",
                    "inverse-surface": "#2a313d",
                    "on-tertiary-fixed-variant": "#842225",
                    "surface-container-high": "#e2e8f8",
                    "error-container": "#ffdad6",
                    "surface-bright": "#f9f9ff",
                    "on-secondary-fixed-variant": "#0039b5",
                    "on-secondary": "#ffffff",
                    "background": "#f9f9ff",
                    "surface-container-highest": "#dce2f3",
                    "inverse-on-surface": "#ebf1ff"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Inter"],
                    "display": ["Inter"],
                    "body": ["Inter"],
                    "label": ["Inter"]
            }
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Inter', sans-serif; background-color: #f9f9ff; }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-background text-on-surface">
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
</div>
</header>
<!-- Main Content: Split Layout -->
<main class="flex-grow flex flex-col lg:flex-row">
<!-- Left Side: Visual/Image -->
<section class="hidden lg:block lg:w-1/2 relative overflow-hidden">
<div class="absolute inset-0 bg-primary/20 mix-blend-multiply z-10"></div>
<img alt="Clean City View" class="absolute inset-0 w-full h-full object-cover" data-alt="A panoramic, high-angle view of a futuristic green city characterized by lush vertical gardens on glass skyscrapers and pristine, wide pedestrian walkways. The atmosphere is vibrant and clean, bathed in the soft, golden light of early morning which highlights the emerald green foliage and sparkling solar panels. People of diverse backgrounds are seen collaborating and walking together in harmony with nature. The overall visual style is modern, professional, and optimistic, utilizing a palette of deep greens and bright whites to evoke environmental trust and civic progress." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCD_PWucYXs2w65IjWxs1KOhym7SiGJw9rsTXnaf_3-eH6EvafO1RqCdlXjUcSZYs9eaq8qYzdKVY_PByWqdxXsLZ8S6OdA_m58pxOlMIgdAb0VRRtz-JwVn8jtVpGPSIIbbjLeGa8kGRlK3IrExNCIPho1McAnYnusABqW_Nk1w-vWbNSRXlcHGCoQwTMii_959AE7-IKei8peHHOyKJoRTcWnLv9vvCSOcZWB0XzCuSDMJJRJkRnRg82n9mA4sfupc0jGaSYXfds">
<div class="absolute bottom-12 left-12 right-12 z-20 text-white">
<div class="bg-white/10 backdrop-blur-md p-8 rounded-xl border border-white/20">
<h2 class="text-3xl font-headline font-bold mb-4">Kota Bersih, Warga Sejahtera.</h2>
<p class="text-lg opacity-90 leading-relaxed">Bergabunglah bersama ribuan warga lainnya dalam memantau dan menjaga kebersihan lingkungan kita demi masa depan yang lebih hijau.</p>
</div>
</div>
</section>
<!-- Right Side: Login Form -->
<section class="w-full lg:w-1/2 flex items-center justify-center p-6 md:p-12 lg:p-24 bg-surface">
<div class="max-w-md w-full">
<!-- Brand Header for Mobile -->
<div class="lg:hidden mb-8">
<span class="text-primary font-black text-2xl tracking-tight">SIPANTAU</span>
</div>
<div class="mb-10">
<h1 class="text-3xl font-headline font-extrabold text-on-surface mb-2">Selamat Datang di SIPANTAU</h1>
<p class="text-on-surface-variant font-body">Masuk untuk mengelola dan melaporkan kebersihan lingkungan</p>
</div>
<form method="POST" action="{{ route('login') }}" class="space-y-6">
@csrf
<div class="space-y-2">
<label class="block text-sm font-bold text-on-surface-variant" for="email">Email atau Username</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">mail</span>
<input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" id="email" name="email" placeholder="Masukkan email Anda" type="text" value="{{ old('email') }}">
</div>
@error('email')
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
</div>
<div class="space-y-2">
<div class="flex justify-between items-center">
<label class="block text-sm font-bold text-on-surface-variant" for="password">Password</label>
@if (Route::has('password.request'))
<a class="text-sm font-semibold text-secondary hover:underline" href="{{ route('password.request') }}">Lupa Password?</a>
@endif
</div>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 material-symbols-outlined text-outline">lock</span>
              <input class="w-full pl-10 pr-4 py-3 bg-white border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent transition-all outline-none" id="password" name="password" placeholder="••••••••" type="password">
            </div>
@error('password')
<p class="text-sm text-red-600">{{ $message }}</p>
@enderror
</div>
<div class="flex items-center gap-2">
<input class="w-4 h-4 text-primary rounded border-outline-variant focus:ring-primary" id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
<label class="text-sm text-on-surface-variant" for="remember">Ingat saya di perangkat ini</label>
</div>
<button class="w-full py-4 bg-primary-container text-on-primary-container font-bold rounded-lg shadow-sm hover:shadow-md active:scale-[0.98] transition-all flex items-center justify-center gap-2 group" type="submit">
                        Masuk
                        <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
</form>
<div class="mt-12 pt-8 border-t border-outline-variant text-center">
<p class="text-on-surface-variant">Belum memiliki akun?
                        <a class="text-secondary font-bold hover:underline" href="{{ route('register') }}">Daftar Sekarang</a>
</p>
</div>
<div class="mt-8 flex flex-wrap justify-center gap-4">
<button class="w-full bg-white border border-outline-variant text-on-surface font-semibold py-3.5 rounded-lg hover:bg-surface-container-low active:scale-[0.98] transition-all flex items-center justify-center gap-3" type="button">
<svg class="w-5 h-5" viewBox="0 0 48 48">
<path d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" fill="#FFC107"></path>
<path d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" fill="#FF3D00"></path>
<path d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" fill="#4CAF50"></path>
<path d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,24,34C24,22.659,43.862,21.35,43.611,20.083z" fill="#1976D2"></path>
</svg>
<span class="">Masuk dengan Google</span>
</button>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="w-full py-8 bg-surface-container-highest border-t border-outline-variant"></footer>


</body></html>
