<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Laporan Saya | SIPANTAU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <div class="bg-white border-b border-slate-200 px-8 py-5 flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-slate-900">Laporan Saya</h1>
                    <p class="text-sm text-slate-600 mt-1">Kelola semua laporan lingkungan Anda di sini</p>
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 hover:bg-slate-100 rounded-lg transition">
                        <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0018 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                        <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a9 9 0 00-9 9h18a9 9 0 00-9-9z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Scrollable Content Area -->
            <div class="flex-1 overflow-auto">
                <div class="p-8 grid grid-cols-3 gap-6">
                    <!-- Reports Section (Left: 2 columns) -->
                    <div class="col-span-2 space-y-6">
                        <!-- Reports Grid -->
                        <div class="space-y-6">
                            <!-- Report 1 -->
                            @include('partials.report-card', [
                                'status' => 'processing',
                                'title' => 'Saluran Drainase Tersumbat di Jalan Merdeka',
                                'date' => '24 Mei 2026',
                                'image' => 'https://images.unsplash.com/photo-1559027615-cd2628902d4a?w=300&h=300&fit=crop',
                                'step' => 2
                            ])

                            <!-- Report 2 -->
                            @include('partials.report-card', [
                                'status' => 'completed',
                                'title' => 'Sampah Plastik di Sungai Ciliwung',
                                'date' => '22 Mei 2026',
                                'image' => 'https://images.unsplash.com/photo-1559027615-cd2628902d4a?w=300&h=300&fit=crop',
                                'step' => 3
                            ])

                            <!-- Empty State -->
                            <div class="text-center py-12 bg-white rounded-2xl border border-slate-200">
                                <svg class="w-16 h-16 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-lg font-semibold text-slate-900 mb-2">Tidak ada laporan lagi</h3>
                                <p class="text-slate-600">Buat laporan baru melalui panel di samping kanan</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Panel (Right: 1 column) -->
                    <div class="col-span-1">
                        @include('partials.report-form')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle drag and drop for file upload
        const fileInput = document.getElementById('photo');
        const dropZone = fileInput?.parentElement?.parentElement;

        if (dropZone) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropZone.addEventListener(eventName, () => {
                    dropZone.classList.add('border-emerald-500', 'bg-emerald-50');
                });
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropZone.addEventListener(eventName, () => {
                    dropZone.classList.remove('border-emerald-500', 'bg-emerald-50');
                });
            });

            dropZone.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                fileInput.files = files;
            });
        }
    </script>
</body>
</html>
