<!-- Sidebar -->
<div class="w-72 bg-white border-r border-slate-200 flex flex-col min-h-screen">
    @if(auth()->user()->isAdmin())
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-900 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-100 font-semibold' : 'hover:bg-slate-100 text-slate-700' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4h4" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('verifikasi-laporans.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 {{ request()->routeIs('verifikasi-laporans.*') ? 'bg-slate-100 font-semibold text-slate-900' : 'hover:bg-slate-100' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1.5-2.5a6 6 0 11-9.5 5.5" />
                </svg>
                <span>Verifikasi</span>
            </a>

            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 {{ request()->routeIs('profile.*') ? 'bg-slate-100 font-semibold text-slate-900' : 'hover:bg-slate-100' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.904 0 5.605.952 7.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Pengaturan</span>
            </a>
        </nav>

        <div class="border-t border-slate-200 p-4 space-y-3">
            <button class="flex items-center gap-3 w-full px-4 py-2 text-slate-700 hover:bg-slate-100 rounded-lg transition text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Bantuan
            </button>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    @elseif(auth()->user()->isPetugas())
        <div class="px-6 py-6 border-b border-slate-200">
            <p class="text-xs uppercase tracking-[0.2em] text-emerald-700 font-semibold">Petugas Kebersihan</p>
            <h3 class="mt-3 text-lg font-semibold text-slate-900">Tugas Lapangan</h3>
            <p class="mt-2 text-sm text-slate-500">Menerima laporan sampah, menindaklanjuti di lapangan, dan memberikan update hasil penanganan.</p>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('petugas.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-900 {{ request()->routeIs('petugas.dashboard') ? 'bg-slate-100 font-semibold' : 'hover:bg-slate-100 text-slate-700' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4h4" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('laporans.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 {{ request()->routeIs('laporans.*') ? 'bg-slate-100 font-semibold text-slate-900' : 'hover:bg-slate-100' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <span>Informasi Laporan</span>
            </a>

            <a href="{{ route('tanggapans.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 {{ request()->routeIs('tanggapans.create') ? 'bg-slate-100 font-semibold text-slate-900' : 'hover:bg-slate-100' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span>Update Penanganan</span>
            </a>

            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 {{ request()->routeIs('profile.*') ? 'bg-slate-100 font-semibold text-slate-900' : 'hover:bg-slate-100' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.904 0 5.605.952 7.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span>Pengaturan</span>
            </a>
        </nav>

        <div class="border-t border-slate-200 p-4 space-y-3">
            <button class="flex items-center gap-3 w-full px-4 py-2 text-slate-700 hover:bg-slate-100 rounded-lg transition text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Bantuan
            </button>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    @else
        <!-- Logo & Brand -->
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-10 h-10 rounded-xl bg-emerald-700 flex items-center justify-center">
                    <span class="text-white font-bold text-lg">S</span>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">SIPANTAU</h3>
                    <p class="text-xs text-slate-500">Dashboard Masyarakat</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="flex-1 px-4 py-6 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-900 {{ request()->routeIs('dashboard') ? 'bg-slate-100 font-semibold' : 'hover:bg-slate-100 text-slate-700' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4h4" />
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('laporans.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-slate-700 {{ request()->routeIs('laporans.*') ? 'bg-emerald-700 text-white font-semibold' : 'hover:bg-slate-100' }} transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <span>Laporan Saya</span>
            </a>
        </nav>

        <!-- Bottom Actions -->
        <div class="border-t border-slate-200 p-4 space-y-3">
            <a href="{{ route('laporans.create') }}" class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-emerald-700 text-white font-semibold rounded-xl hover:bg-emerald-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Laporan Baru
            </a>

            <button class="flex items-center gap-3 w-full px-4 py-2 text-slate-700 hover:bg-slate-100 rounded-lg transition text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-slate-700">Bantuan</span>
            </button>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg transition text-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    @endif
</div>
