<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Laporan Saya') }}</h2>
                <p class="text-sm text-slate-500">Kelola laporan Anda dan lihat status penanganannya.</p>
            </div>
            @if(auth()->user()->isMasyarakat())
                <a href="{{ route('laporans.create') }}" class="inline-flex items-center rounded-xl bg-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:bg-emerald-800 transition">
                    Buat Laporan Baru
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900 mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid gap-6">
                @forelse($laporans as $laporan)
                    @php
                        $statusClass = match($laporan->status) {
                            'menunggu' => 'bg-yellow-100 text-yellow-800',
                            'diproses' => 'bg-sky-100 text-sky-800',
                            'selesai' => 'bg-emerald-100 text-emerald-800',
                            'ditolak' => 'bg-rose-100 text-rose-800',
                            default => 'bg-slate-100 text-slate-700',
                        };
                    @endphp

                    <div class="rounded-3xl bg-white/95 p-6 shadow-xl hover:shadow-2xl transition transform hover:-translate-y-1 border border-slate-200">
                        <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                            <div>
                                <div class="flex items-center gap-3 text-sm">
                                    <span class="inline-flex rounded-full px-3 py-1 font-semibold {{ $statusClass }}">{{ ucfirst($laporan->status) }}</span>
                                    <span class="text-slate-500">{{ $laporan->created_at->translatedFormat('d M Y') }}</span>
                                </div>
                                <h3 class="mt-4 text-2xl font-semibold text-slate-900">{{ $laporan->judul }}</h3>
                                <p class="mt-2 text-sm leading-6 text-slate-600">{{ \Illuminate\Support\Str::limit($laporan->deskripsi, 180) }}</p>
                                <p class="mt-4 text-sm text-slate-500">Lokasi: {{ $laporan->lokasi }}</p>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">
                                <a href="{{ route('laporans.show', $laporan) }}" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">Detail</a>
                                @if(auth()->user()->isAdmin() || auth()->id() === $laporan->user_id)
                                    <a href="{{ route('laporans.edit', $laporan) }}" class="rounded-2xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50 transition">Edit</a>
                                    <form action="{{ route('laporans.destroy', $laporan) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus laporan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-2xl bg-rose-600 px-4 py-2 text-sm font-semibold text-white hover:bg-rose-700 transition">Hapus</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 text-center text-slate-600 shadow-sm">
                        Belum ada laporan. Buat laporan baru untuk memulai.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
