<nav x-data="{ open: false }" class="relative z-30 border-b border-slate-200 bg-white/80 backdrop-blur-lg">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-3">
                    <div class="rounded-2xl bg-emerald-900/10 px-3 py-2 text-emerald-800 font-semibold tracking-[0.08em]">SIPANTAU</div>
                </a>

                <nav class="hidden lg:flex items-center gap-6 text-sm font-medium text-slate-700">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard','admin.dashboard','petugas.dashboard') ? 'text-emerald-900 font-semibold' : 'transition hover:text-emerald-700' }}">Dashboard</a>
                    <a href="{{ route('laporans.index') }}" class="{{ request()->routeIs('laporans.*') ? 'text-emerald-900 font-semibold' : 'transition hover:text-emerald-700' }}">Laporan</a>
                    @if(auth()->user()->isPetugas())
                        <a href="{{ route('tanggapans.create') }}" class="{{ request()->routeIs('tanggapans.create') ? 'text-emerald-900 font-semibold' : 'transition hover:text-emerald-700' }}">Update Penanganan</a>
                    @endif
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('verifikasi-laporans.index') }}" class="{{ request()->routeIs('verifikasi-laporans.*') ? 'text-emerald-900 font-semibold' : 'transition hover:text-emerald-700' }}">Verifikasi</a>
                        <a href="{{ route('admin.execution-time') }}" class="{{ request()->routeIs('admin.execution-time') ? 'text-emerald-900 font-semibold' : 'transition hover:text-emerald-700' }}">Waktu Eksekusi</a>
                    @endif
                </nav>
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('profile.edit') }}" class="hidden sm:inline-flex h-11 items-center justify-center rounded-2xl border border-slate-300/90 bg-white px-4 text-sm font-semibold text-slate-900 shadow-sm transition hover:border-emerald-300 hover:text-emerald-700">{{ Auth::user()->name }}</a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 rounded-2xl bg-white border border-slate-200 text-sm text-slate-700 hover:bg-slate-50">
                            <svg class="h-4 w-4 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">@csrf<x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">Log Out</x-dropdown-link></form>
                    </x-slot>
                </x-dropdown>

                <!-- Mobile hamburger -->
                <div class="-me-2 flex items-center lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-700 hover:bg-slate-100">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard','admin.dashboard','petugas.dashboard')">Dashboard</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('laporans.index')" :active="request()->routeIs('laporans.*')">Laporan</x-responsive-nav-link>
            @if(auth()->user()->isPetugas())
                <x-responsive-nav-link :href="route('tanggapans.create')" :active="request()->routeIs('tanggapans.create')">Update Penanganan</x-responsive-nav-link>
            @endif
            @if(auth()->user()->isAdmin())
                <x-responsive-nav-link :href="route('verifikasi-laporans.index')" :active="request()->routeIs('verifikasi-laporans.*')">Verifikasi</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.execution-time')" :active="request()->routeIs('admin.execution-time')">Waktu Eksekusi</x-responsive-nav-link>
            @endif
        </div>
        <div class="pt-4 pb-1 border-t border-slate-200 px-4">
            <div class="font-medium text-base text-slate-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-slate-500">{{ Auth::user()->email }}</div>
        </div>
    </div>
</nav>
