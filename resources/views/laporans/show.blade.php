<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Detail Laporan') }}</h2>
                <p class="text-sm text-slate-500">Informasi lengkap laporan Anda.</p>
            </div>
            <a href="{{ route('laporans.index') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali ke Laporan Saya
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                @if(session('success'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <div class="space-y-4">
                        <div class="flex flex-wrap items-center gap-3 text-sm">
                            @php
                                $statusClass = match($laporan->status) {
                                    'menunggu' => 'bg-yellow-100 text-yellow-800',
                                    'diproses' => 'bg-sky-100 text-sky-800',
                                    'selesai' => 'bg-emerald-100 text-emerald-800',
                                    'ditolak' => 'bg-rose-100 text-rose-800',
                                    default => 'bg-slate-100 text-slate-700',
                                };
                            @endphp
                            <span class="inline-flex rounded-full px-3 py-1 font-semibold {{ $statusClass }}">{{ ucfirst($laporan->status) }}</span>
                            <span class="text-slate-500">{{ $laporan->created_at->translatedFormat('d M Y H:i') }}</span>
                            @if($laporan->tanggal)
                                <span class="text-slate-500">• Tanggal: {{ (is_string($laporan->tanggal) ? \Carbon\Carbon::parse($laporan->tanggal)->translatedFormat('d M Y') : $laporan->tanggal->translatedFormat('d M Y')) }}</span>
                            @endif
                            <span class="text-slate-500">• oleh {{ $laporan->user->name }}</span>
                        </div>

                        <h1 class="text-3xl font-semibold text-slate-900">{{ $laporan->judul }}</h1>
                        <p class="text-sm leading-7 text-slate-600">{{ $laporan->deskripsi }}</p>

                        <div class="rounded-3xl bg-white p-4 text-sm text-slate-700 border border-slate-200 shadow-sm">
                            <p class="font-semibold">Lokasi:</p>
                            <p>{{ $laporan->lokasi }}</p>
                            @if($laporan->latitude && $laporan->longitude)
                                <p class="mt-2 text-sm text-slate-500">{{ $laporan->latitude }}, {{ $laporan->longitude }}</p>
                            @endif
                        </div>

                        @if($laporan->verifikasiLaporans->isNotEmpty())
                            <div class="rounded-3xl bg-white p-4 text-sm text-slate-700 border border-slate-200 shadow-sm">
                                <p class="font-semibold text-slate-900">Hasil Verifikasi</p>
                                <p class="mt-2">Status: <span class="font-semibold">{{ ucfirst($laporan->verifikasiLaporans->last()->status) }}</span></p>
                                <p class="mt-2">Catatan: {{ $laporan->verifikasiLaporans->last()->catatan ?? 'Tidak ada catatan.' }}</p>
                            </div>
                        @endif

                        @if($laporan->tanggapans->isNotEmpty())
                            <div class="rounded-3xl bg-white p-4 text-sm text-slate-700 border border-slate-200 shadow-sm">
                                <p class="font-semibold text-slate-900">Riwayat Penanganan</p>
                                @foreach($laporan->tanggapans as $tanggapan)
                                    <div class="mt-4 rounded-2xl bg-slate-50 p-4">
                                        <p class="text-sm font-semibold text-slate-900">{{ $tanggapan->petugas->name }}</p>
                                        <p class="mt-1 text-sm text-slate-600">{{ $tanggapan->isi_tanggapan }}</p>
                                        @if($tanggapan->foto_bukti)
                                            <img src="{{ Storage::url($tanggapan->foto_bukti) }}" alt="Bukti" class="mt-3 h-40 w-full rounded-3xl object-cover" />
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="space-y-3 rounded-3xl bg-white p-6 border border-slate-200 shadow-sm">
                        <p class="text-sm font-semibold text-slate-700">Aksi</p>
                        @if(auth()->user()->isAdmin() || auth()->id() === $laporan->user_id)
                            <a href="{{ route('laporans.edit', $laporan) }}" class="block rounded-2xl bg-white px-4 py-2 text-sm font-semibold text-slate-700 border border-slate-200 hover:bg-slate-50 transition">Edit Laporan</a>
                            <form action="{{ route('laporans.destroy', $laporan) }}" method="POST" onsubmit="return confirm('Hapus laporan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full rounded-2xl bg-rose-600 px-4 py-2 text-sm font-semibold text-white hover:bg-rose-700 transition">Hapus Laporan</button>
                            </form>
                        @endif
                        @if(auth()->user()->isPetugas() && $laporan->status === 'diproses')
                            <a href="{{ route('tanggapans.create') }}?laporan_id={{ $laporan->id }}" class="block rounded-2xl bg-gradient-to-r from-emerald-600 to-emerald-700 px-4 py-2 text-sm font-semibold text-white hover:from-emerald-700 hover:to-emerald-800 transition">Tangani Laporan</a>
                        @endif
                    </div>
                </div>

                @if($laporan->lampiranLaporans->isNotEmpty())
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-slate-900">Lampiran</h3>
                        <div class="mt-4 grid gap-4 sm:grid-cols-2">
                            @foreach($laporan->lampiranLaporans as $lampiran)
                                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                                    <img src="{{ Storage::url($lampiran->file_path) }}" alt="Lampiran" class="h-52 w-full object-cover" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($laporan->latitude && $laporan->longitude)
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold text-slate-900">Peta Lokasi</h3>
                        <div id="map-show" class="mt-4 h-64 w-full rounded-3xl border border-slate-200 bg-white"></div>
                    </div>
                @endif
                <script>
                    function initMapShow() {
                        const lat = parseFloat('{{ $laporan->latitude ?? "" }}');
                        const lng = parseFloat('{{ $laporan->longitude ?? "" }}');
                        if (!isNaN(lat) && !isNaN(lng)) {
                            const map = new google.maps.Map(document.getElementById('map-show'), {
                                center: { lat: lat, lng: lng },
                                zoom: 14,
                            });
                            new google.maps.Marker({ position: { lat: lat, lng: lng }, map: map });
                        }
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&callback=initMapShow"></script>
            </div>
        </div>
    </div>
</x-app-layout>
