<!-- Report Card -->
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
    <div class="p-6">
        <!-- Header with Status Badge and Image -->
        <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
                <!-- Status Badge -->
                <div class="inline-block">
                    @if($status === 'completed')
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-xs font-semibold rounded-full">
                            ✓ Selesai
                        </span>
                    @elseif($status === 'processing')
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                            ⊙ Sedang Diproses
                        </span>
                    @else
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">
                            ⏱ Menunggu
                        </span>
                    @endif
                </div>
            </div>

            <!-- Thumbnail Image -->
            <img src="{{ $image }}" alt="{{ $title }}" class="w-24 h-24 object-cover rounded-lg">
        </div>

        <!-- Title -->
        <h3 class="text-lg font-bold text-slate-900 mb-2">
            {{ $title }}
        </h3>

        <!-- Date Info -->
        <p class="text-sm text-slate-600 mb-6">
            Dilaporkan pada: {{ $date }}
        </p>

        <!-- Progress Tracking -->
        <div class="space-y-3">
            <p class="text-xs font-semibold text-slate-700 uppercase tracking-wider">Status Penanganan</p>

            <div class="flex items-center justify-between">
                <!-- Step 1: Menunggu -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full {{ $step >= 1 ? 'bg-emerald-700' : 'bg-slate-300' }} flex items-center justify-center mb-2">
                        @if($step >= 1)
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        @else
                            <span class="text-white text-xs font-bold">1</span>
                        @endif
                    </div>
                    <span class="text-xs text-slate-600">Menunggu</span>
                </div>

                <!-- Line 1 to 2 -->
                <div class="flex-1 h-0.5 {{ $step >= 2 ? 'bg-emerald-700' : 'bg-slate-300' }} mx-2 mt-4"></div>

                <!-- Step 2: Diproses -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full {{ $step >= 2 ? 'bg-emerald-700' : 'bg-slate-300' }} flex items-center justify-center mb-2">
                        @if($step >= 2)
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        @else
                            <span class="text-white text-xs font-bold">2</span>
                        @endif
                    </div>
                    <span class="text-xs text-slate-600">Diproses</span>
                </div>

                <!-- Line 2 to 3 -->
                <div class="flex-1 h-0.5 {{ $step >= 3 ? 'bg-emerald-700' : 'bg-slate-300' }} mx-2 mt-4"></div>

                <!-- Step 3: Selesai -->
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full {{ $step >= 3 ? 'bg-emerald-700' : 'bg-slate-300' }} flex items-center justify-center mb-2">
                        @if($step >= 3)
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        @else
                            <span class="text-white text-xs font-bold">3</span>
                        @endif
                    </div>
                    <span class="text-xs text-slate-600">Selesai</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-3 mt-6 pt-6 border-t border-slate-200">
            <a href="#" class="flex-1 px-4 py-2 text-center text-sm font-medium text-emerald-700 hover:bg-emerald-50 rounded-lg transition">
                Lihat Detail
            </a>
            <a href="#" class="flex-1 px-4 py-2 text-center text-sm font-medium text-slate-700 hover:bg-slate-100 rounded-lg transition">
                Bagikan
            </a>
        </div>
    </div>
</div>
