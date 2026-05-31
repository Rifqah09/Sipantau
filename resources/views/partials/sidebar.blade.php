<!-- Sidebar -->
<div class="w-64 bg-white border-r border-slate-200 flex flex-col">
    <!-- Logo & Brand -->
    <div class="p-6 border-b border-slate-200">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-xl bg-emerald-700 flex items-center justify-center">
                <span class="text-white font-bold text-lg">S</span>
            </div>
            <div>
                <h3 class="font-bold text-slate-900">SIPANTAU</h3>
                <p class="text-xs text-slate-500">
                    {{ auth()->user()->isAdmin() ? 'Dashboard Admin' : (auth()->user()->isPetugas() ? 'Dashboard Petugas' : 'Dashboard Masyarakat') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : (auth()->user()->isPetugas() ? route('petugas.dashboard') : route('dashboard')) }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-100 rounded-xl transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 4h4" />
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('laporans.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-100 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <span class="font-medium">Semua Laporan</span>
            </a>

            <a href="{{ route('verifikasi-laporans.index') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-100 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1.5-2.5a6 6 0 11-9.5 5.5" />
                </svg>
                <span class="font-medium">Verifikasi Laporan</span>
            </a>

            <a href="{{ route('peta') }}" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-100 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A2 2 0 013 15.382V5.618a2 2 0 011.053-1.789L9 1l6 3 5.947-2.809A2 2 0 0122 3.618v9.764a2 2 0 01-1.053 1.789L15 20l-6-3z" />
                </svg>
                <span class="font-medium">Lihat Peta</span>
            </a>
        @else
            <a href="{{ route('laporans.index') }}" class="flex items-center gap-3 px-4 py-3 text-white bg-emerald-700 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
                <span class="font-medium">Laporan Saya</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-700 hover:bg-slate-100 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747 0-6.002-4.5-10.747-10-10.747z" />
                </svg>
                <span class="font-medium">Edukasi</span>
            </a>
        @endif
    </nav>

    <!-- Bottom Actions -->
    <div class="border-t border-slate-200 p-4 space-y-3">
        @if(auth()->user()->isAdmin())
            <a href="{{ route('verifikasi-laporans.index') }}" class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-emerald-700 text-white font-semibold rounded-xl hover:bg-emerald-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1.5-2.5a6 6 0 11-9.5 5.5" />
                </svg>
                Kelola Verifikasi
            </a>
        @elseif(auth()->user()->isMasyarakat())
            <a href="{{ route('laporans.create') }}" class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-emerald-700 text-white font-semibold rounded-xl hover:bg-emerald-800 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Laporan Baru
            </a>
        @endif

        <!-- Help -->
        <button class="flex items-center gap-3 w-full px-4 py-2 text-slate-700 hover:bg-slate-100 rounded-lg transition text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-slate-700">Bantuan</span>
        </button>

        <!-- Logout -->
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
</div>
