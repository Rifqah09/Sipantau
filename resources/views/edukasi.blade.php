<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edukasi Lingkungan') }}</h2>
                <p class="text-sm text-slate-500">Pelajari cara melaporkan sampah dan menjaga kebersihan lingkungan.</p>
            </div>
        </div>
    </x-slot>

    <div class="flex min-h-[calc(100vh-5rem)] overflow-hidden">
        @include('partials.sidebar')

        <div class="flex-1 overflow-auto bg-slate-50">
            <div class="p-8 space-y-6">
                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h1 class="text-3xl font-bold text-slate-900">Edukasi untuk Masyarakat</h1>
                    <p class="mt-3 text-slate-600">Informasi singkat untuk membantu Anda mengenali jenis laporan dan tindakan yang tepat.</p>
                </div>

                <div class="grid gap-6 lg:grid-cols-3">
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-slate-900">Cara Melaporkan</h2>
                        <p class="mt-3 text-sm text-slate-600">Isi judul dengan jelas, deskripsikan kondisi sampah, dan sertakan lokasi yang tepat.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-slate-900">Tipe Laporan</h2>
                        <p class="mt-3 text-sm text-slate-600">Laporkan sampah di jalan, drainase, sungai, atau fasilitas umum agar petugas dapat menindaklanjutinya.</p>
                    </div>
                    <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="text-xl font-semibold text-slate-900">Apa yang Terjadi Setelah Laporan</h2>
                        <p class="mt-3 text-sm text-slate-600">Laporan diverifikasi oleh admin, kemudian petugas akan menerima tugas untuk menangani sampah tersebut.</p>
                    </div>
                </div>

                <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-2xl font-semibold text-slate-900">Tips Kebersihan</h2>
                    <ul class="mt-4 space-y-3 text-sm text-slate-600 list-disc list-inside">
                        <li>Buang sampah pada tempatnya dan pisahkan sampah organik serta non-organik.</li>
                        <li>Laporkan genangan air, sampah menumpuk, atau penyumbatan drainase.</li>
                        <li>Ajak tetangga peduli lingkungan dengan cara sederhana setiap hari.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
