<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | SIPANTAU - Sistem Pelaporan Lingkungan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <div class="flex h-screen">
        <!-- LEFT SIDE - Hero Image Section (Hidden on Mobile) -->
        <div class="hidden lg:flex w-1/2 relative overflow-hidden bg-gradient-to-br from-emerald-900 to-emerald-700">
            <!-- Background Image -->
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/login-bg.jpg') }}');"></div>

            <!-- Overlay Gelap Transparan -->
            <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/50 via-emerald-900/40 to-emerald-950/60"></div>

            <!-- Glassmorphism Card Bottom Left -->
            <div class="absolute bottom-8 left-8 right-8 z-10">
                <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-2xl p-8 shadow-2xl">
                    <h2 class="text-4xl font-bold text-white mb-4 leading-tight">
                        Kota Bersih, Warga Sejahtera.
                    </h2>
                    <p class="text-white/80 text-base leading-relaxed">
                        Bergabunglah bersama ribuan warga lainnya dalam memantau dan menjaga kebersihan lingkungan kita demi masa depan yang lebih hijau.
                    </p>
                    <div class="mt-6 flex gap-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-500 opacity-60"></div>
                        <div class="w-3 h-3 rounded-full bg-emerald-600 opacity-40"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE - Form Section -->
        <div class="w-full lg:w-1/2 flex flex-col bg-white">
            <!-- Top Navbar -->
            <nav class="border-b border-slate-200/50 bg-white sticky top-0 z-20">
                <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <!-- Logo -->
                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 rounded-xl bg-emerald-700 flex items-center justify-center">
                                <span class="text-white font-bold text-lg">S</span>
                            </div>
                            <span class="hidden sm:inline text-lg font-bold text-slate-900">SIPANTAU</span>
                        </div>

                        <!-- Menu Desktop -->
                        <nav class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-700">
                            <a href="/" class="transition hover:text-emerald-700">Beranda</a>
                            <a href="/" class="transition hover:text-emerald-700">Peta</a>
                            <a href="/" class="transition hover:text-emerald-700">Lapor</a>
                            <a href="/" class="transition hover:text-emerald-700">Edukasi</a>
                        </nav>

                        <!-- Icons Right -->
                        <div class="flex items-center gap-3">
                            <button class="p-2 hover:bg-slate-100 rounded-lg transition">
                                <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <button class="p-2 hover:bg-slate-100 rounded-lg transition">
                                <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a9 9 0 00-9 9h18a9 9 0 00-9-9z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Login Form Container -->
            <div class="flex-1 flex items-center justify-center px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
                <div class="w-full max-w-md">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-xl text-emerald-800 text-sm">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl sm:text-4xl font-bold text-slate-900 mb-2">
                            Selamat Datang di SIPANTAU
                        </h1>
                        <p class="text-slate-600 text-base">
                            Masuk untuk mengelola dan melaporkan kebersihan lingkungan
                        </p>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-900 mb-2">
                                Email atau Username
                            </label>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="Masukkan email Anda"
                                    required
                                    autofocus
                                    autocomplete="email"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                                />
                            </div>
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="password" class="block text-sm font-semibold text-slate-900">
                                    Password
                                </label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-emerald-700 hover:text-emerald-800 font-medium transition">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>
                            <div class="relative">
                                <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password Anda"
                                    required
                                    autocomplete="current-password"
                                    class="w-full pl-12 pr-4 py-3 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition"
                                />
                                <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition" onclick="togglePassword('password')">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                id="remember"
                                name="remember"
                                {{ old('remember') ? 'checked' : '' }}
                                class="w-4 h-4 rounded border-slate-300 text-emerald-700 focus:ring-emerald-500 cursor-pointer"
                            />
                            <label for="remember" class="ml-3 text-sm text-slate-700 cursor-pointer">
                                Ingat saya di perangkat ini
                            </label>
                        </div>

                        <!-- Login Button -->
                        <button
                            type="submit"
                            class="w-full bg-emerald-700 hover:bg-emerald-800 text-white font-semibold py-3 rounded-xl transition duration-200 transform hover:scale-[1.02] flex items-center justify-center gap-2"
                        >
                            <span>Masuk</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>

                        <!-- Divider -->
                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-slate-200"></div>
                            </div>
                            <div class="relative flex justify-center text-sm">
                                <span class="px-3 bg-white text-slate-600">Belum memiliki akun?</span>
                            </div>
                        </div>

                        <!-- Sign Up Link -->
                        <a
                            href="{{ route('register') }}"
                            class="block w-full text-center px-4 py-3 border-2 border-emerald-700 text-emerald-700 font-semibold rounded-xl hover:bg-emerald-50 transition"
                        >
                            Daftar Sekarang
                        </a>

                        <!-- Google Login -->
                        <button
                            type="button"
                            class="w-full px-4 py-3 border-2 border-slate-300 rounded-xl font-semibold text-slate-900 hover:bg-slate-50 transition flex items-center justify-center gap-3"
                        >
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            <span>Masuk dengan Google</span>
                        </button>
                    </form>

                    <!-- Footer Text -->
                    <p class="mt-8 text-center text-sm text-slate-600">
                        © 2026 SIPANTAU • Dinas Lingkungan Hidup
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const isPassword = field.type === 'password';
            field.type = isPassword ? 'text' : 'password';
        }
    </script>
</body>
</html>
