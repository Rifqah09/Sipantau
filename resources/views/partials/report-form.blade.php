<!-- Report Form Panel -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 h-fit sticky top-6">
    <h3 class="text-lg font-bold text-slate-900 mb-2">Buat Laporan Baru</h3>
    <p class="text-sm text-slate-600 mb-6">Isi detail di bawah untuk melaporkan masalah.</p>

    <form method="POST" action="{{ route('laporans.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="judul" class="block text-sm font-semibold text-slate-900 mb-2">Judul Laporan</label>
            <input id="judul" name="judul" type="text" value="{{ old('judul') }}" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
            @error('judul')
                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-semibold text-slate-900 mb-2">Deskripsi Masalah</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsikan masalah lingkungan yang Anda temukan..." class="w-full px-4 py-3 border border-slate-300 rounded-xl text-slate-900 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition resize-none" required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="lokasi" class="block text-sm font-semibold text-slate-900 mb-2">Lokasi Kejadian</label>
            <input id="lokasi" name="lokasi" type="text" value="{{ old('lokasi') }}" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
            @error('lokasi')
                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="latitude" class="block text-sm font-semibold text-slate-900 mb-2">Latitude</label>
                <input id="latitude" name="latitude" type="text" value="{{ old('latitude') }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                @error('latitude')
                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="longitude" class="block text-sm font-semibold text-slate-900 mb-2">Longitude</label>
                <input id="longitude" name="longitude" type="text" value="{{ old('longitude') }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-slate-900 focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500/20" />
                @error('longitude')
                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Upload Foto</label>
            <div class="relative border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-emerald-500 transition cursor-pointer group">
                <input type="file" id="photo" name="photo" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" />
                <div class="pointer-events-none">
                    <svg class="w-10 h-10 text-slate-400 mx-auto mb-2 group-hover:text-emerald-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <p class="text-sm text-slate-600">Tarik foto di sini atau klik untuk memilih</p>
                    <p class="text-xs text-slate-500 mt-1">Max. 5 MB</p>
                </div>
            </div>
            @error('photo')
                <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="w-full px-4 py-3 bg-emerald-700 hover:bg-emerald-800 text-white font-semibold rounded-xl transition duration-200 flex items-center justify-center gap-2 mt-6">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
            Kirim Laporan
        </button>

        <p class="text-xs text-slate-500 text-center mt-4">Laporan Anda akan kami verifikasi dalam 24 jam.</p>
    </form>
</div>
