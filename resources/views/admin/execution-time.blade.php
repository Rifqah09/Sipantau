<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Laporan Waktu Eksekusi') }}</h2>
                <p class="text-sm text-slate-500">Ringkasan lama proses laporan dari masyarakat mengirim laporan sampai petugas mengirim update selesai.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-200 transition">
                Kembali ke Dashboard
            </a>
        </div>
    </x-slot>

    <div class="min-h-[calc(100vh-5rem)] overflow-auto bg-slate-100">
        <div class="p-4 sm:p-8 space-y-6">
            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="grid gap-4 md:grid-cols-3">
                    <div class="rounded-2xl bg-slate-50 p-5 border border-slate-200">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-slate-400">Total Laporan</p>
                        <p class="mt-3 text-3xl font-extrabold text-slate-900">{{ number_format($reportedCount) }}</p>
                    </div>
                    <div class="rounded-2xl bg-emerald-50 p-5 border border-emerald-100">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-600">Rata-rata Eksekusi</p>
                        <p class="mt-3 text-3xl font-extrabold text-emerald-700">{{ $averageExecutionLabel }}</p>
                        <p class="mt-2 text-xs text-emerald-600/80">Laporan masyarakat ke update petugas</p>
                    </div>
                    <div class="rounded-2xl bg-amber-50 p-5 border border-amber-100">
                        <p class="text-xs font-semibold uppercase tracking-[0.3em] text-amber-600">Paling Lama</p>
                        <p class="mt-3 text-3xl font-extrabold text-amber-700">{{ data_get($slowestReport, 'execution_label', '-') }}</p>
                        <p class="mt-2 text-xs text-amber-600/80">Periode laporan masuk ke update selesai</p>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-slate-900">Daftar Durasi Laporan</h3>
                        <p class="text-sm text-slate-500 mt-1">Menampilkan lama waktu eksekusi dari laporan dibuat sampai update petugas.</p>
                    </div>
                    <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-700">{{ number_format($completedReports->count()) }} selesai</span>
                </div>

                <div class="mt-6 overflow-hidden rounded-2xl border border-slate-200">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 uppercase tracking-[0.2em] text-xs">
                                <tr>
                                    <th class="px-4 py-3">Judul</th>
                                    <th class="px-4 py-3">Pelapor</th>
                                    <th class="px-4 py-3">Laporan Dibuat</th>
                                    <th class="px-4 py-3">Update Petugas</th>
                                    <th class="px-4 py-3">Waktu Eksekusi</th>
                                    <th class="px-4 py-3">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200 bg-white">
                                @forelse($executionReports as $item)
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-4 py-4 font-semibold text-slate-900">{{ Str::limit($item['laporan']->judul, 42) }}</td>
                                        <td class="px-4 py-4 text-slate-600">{{ $item['laporan']->user->name }}</td>
                                        <td class="px-4 py-4 text-slate-600">{{ $item['started_at']?->translatedFormat('d M Y H:i') ?? 'Tidak tersedia' }}</td>
                                        <td class="px-4 py-4 text-slate-600">{{ $item['ended_at']?->translatedFormat('d M Y H:i') ?? 'Menunggu update petugas' }}</td>
                                        <td class="px-4 py-4 font-semibold text-emerald-700">{{ $item['execution_label'] ?? 'Belum lengkap' }}</td>
                                        <td class="px-4 py-4">
                                            <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] {{ $item['laporan']->status === 'selesai' ? 'bg-emerald-100 text-emerald-700' : ($item['laporan']->status === 'diproses' ? 'bg-sky-100 text-sky-700' : 'bg-amber-100 text-amber-700') }}">
                                                {{ ucfirst($item['laporan']->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-10 text-center text-slate-500">Belum ada data laporan untuk ditampilkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
