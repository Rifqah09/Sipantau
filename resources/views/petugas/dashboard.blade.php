<x-app-layout>
    <x-slot name="header">
        <div style="display:none"></div>
    </x-slot>

    <div style="font-family:'Plus Jakarta Sans',sans-serif;background:#f0f4f8;min-height:100vh;">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">

        <style>
            :root{--navy:#0b1d35;--teal:#0d9f8a;--teal-lt:#e4f7f5;--teal-dk:#076e60;--sky:#0ea5e9;--slate:#1e293b;--mid:#475569;--soft:#94a3b8;--border:#e2e8f0;--bg:#f0f4f8;--white:#ffffff;--r:1.5rem;--r-sm:0.9rem}
            .pt-wrap *{box-sizing:border-box;margin:0;padding:0}
            .pt-wrap{font-family:'Plus Jakarta Sans',sans-serif}
            .pt-wrap h1,.pt-wrap h2,.pt-wrap h3,.pt-wrap h4{font-family:'Sora',sans-serif}
            .pt-page{max-width:1200px;margin:0 auto;padding:1.75rem 1.5rem;display:flex;flex-direction:column;gap:1.5rem}

            /* HERO */
            .pt-hero{border-radius:var(--r);background:var(--navy);overflow:hidden;position:relative;display:grid;grid-template-columns:1fr auto;align-items:stretch}
            .pt-hero-dots{position:absolute;inset:0;background-image:radial-gradient(circle,rgba(255,255,255,0.04) 1px,transparent 1px);background-size:28px 28px}
            .pt-hero-glow{position:absolute;top:-80px;right:260px;width:320px;height:320px;border-radius:50%;background:radial-gradient(circle,rgba(13,159,138,0.25) 0%,transparent 70%)}
            .pt-hero-left{position:relative;z-index:1;padding:2.25rem 2rem}
            .pt-eyebrow{display:inline-flex;align-items:center;gap:0.5rem;font-size:11px;letter-spacing:0.25em;text-transform:uppercase;color:var(--teal);font-weight:700;margin-bottom:0.85rem}
            .pt-eyebrow-dot{width:6px;height:6px;border-radius:50%;background:var(--teal);animation:pt-pulse 2s ease-in-out infinite}
            @keyframes pt-pulse{0%,100%{opacity:1;transform:scale(1)}50%{opacity:0.5;transform:scale(0.75)}}
            .pt-hero h1{font-size:clamp(1.5rem,3vw,2.1rem);font-weight:800;color:#fff;line-height:1.2;max-width:480px}
            .pt-hero-desc{font-size:0.85rem;color:rgba(255,255,255,0.6);margin-top:0.75rem;line-height:1.75;max-width:420px}
            .pt-hero-right{position:relative;z-index:1;background:rgba(255,255,255,0.04);border-left:1px solid rgba(255,255,255,0.07);padding:2.25rem 2rem;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:0.35rem;min-width:180px}
            .pt-date-icon{width:44px;height:44px;border-radius:0.75rem;background:rgba(13,159,138,0.2);border:1px solid rgba(13,159,138,0.3);display:flex;align-items:center;justify-content:center;color:var(--teal);margin-bottom:0.5rem}
            .pt-date-icon svg{width:22px;height:22px}
            .pt-date-val{font-family:'Sora',sans-serif;font-size:1.1rem;font-weight:700;color:#fff}
            .pt-date-lbl{font-size:10px;letter-spacing:0.25em;text-transform:uppercase;color:rgba(255,255,255,0.4)}
            @media(max-width:640px){.pt-hero{grid-template-columns:1fr}.pt-hero-right{border-left:none;border-top:1px solid rgba(255,255,255,0.07);flex-direction:row;gap:1rem;justify-content:flex-start;min-width:unset}}

            /* STAT CARDS */
            .pt-stat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
            @media(max-width:768px){.pt-stat-grid{grid-template-columns:1fr}}
            .pt-stat{background:var(--white);border-radius:var(--r-sm);border:1px solid var(--border);padding:1.25rem 1.5rem;display:flex;align-items:center;justify-content:space-between;gap:1rem;position:relative;overflow:hidden;transition:transform 0.2s,box-shadow 0.2s;animation:pt-fadeup 0.4s ease both}
            .pt-stat:nth-child(2){animation-delay:0.07s}
            .pt-stat:nth-child(3){animation-delay:0.14s}
            .pt-stat::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px}
            .pt-stat.green::after{background:linear-gradient(90deg,var(--teal),#34d399)}
            .pt-stat.blue::after{background:linear-gradient(90deg,var(--sky),#7dd3fc)}
            .pt-stat.purple::after{background:linear-gradient(90deg,#8b5cf6,#c084fc)}
            .pt-stat:hover{transform:translateY(-2px);box-shadow:0 8px 24px rgba(0,0,0,0.07)}
            .pt-stat-lbl{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.18em;color:var(--soft)}
            .pt-stat-num{font-family:'Sora',sans-serif;font-size:2.5rem;font-weight:800;color:var(--slate);line-height:1;margin:0.4rem 0 0.3rem}
            .pt-stat-desc{font-size:0.78rem;color:var(--mid);line-height:1.5}
            .pt-stat-icon{flex-shrink:0;width:52px;height:52px;border-radius:1rem;display:flex;align-items:center;justify-content:center}
            .pt-stat-icon svg{width:24px;height:24px}
            .pt-stat-icon.green{background:var(--teal-lt);color:var(--teal-dk)}
            .pt-stat-icon.blue{background:#e0f2fe;color:#0369a1}
            .pt-stat-icon.purple{background:#ede9fe;color:#7c3aed}

            /* SECTION HEAD */
            .pt-section-head{display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;margin-bottom:1rem}
            .pt-section-title{font-family:'Sora',sans-serif;font-size:1.15rem;font-weight:700;color:var(--slate)}
            .pt-section-sub{font-size:0.8rem;color:var(--soft);margin-top:2px}

            /* FILTER TABS */
            .pt-filter{display:flex;gap:0.35rem;background:#f1f5f9;border-radius:0.75rem;padding:0.25rem}
            .pt-ftab{border:none;background:none;font-family:'Plus Jakarta Sans',sans-serif;font-size:0.78rem;font-weight:600;color:var(--soft);padding:0.35rem 0.85rem;border-radius:0.55rem;cursor:pointer;transition:all 0.15s;white-space:nowrap}
            .pt-ftab.active{background:var(--white);color:var(--slate);box-shadow:0 1px 4px rgba(0,0,0,0.08)}

            /* TASK GRID */
            .pt-task-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem}
            @media(max-width:1024px){.pt-task-grid{grid-template-columns:repeat(2,1fr)}}
            @media(max-width:640px){.pt-task-grid{grid-template-columns:1fr}}

            /* TASK CARD */
            .pt-task{background:var(--white);border-radius:var(--r-sm);border:1px solid var(--border);padding:1.25rem;display:flex;flex-direction:column;gap:0.85rem;transition:border-color 0.2s,transform 0.2s,box-shadow 0.2s;animation:pt-fadeup 0.4s ease both;position:relative;overflow:hidden}
            .pt-task::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--teal),var(--sky))}
            .pt-task:hover{border-color:var(--teal);transform:translateY(-3px);box-shadow:0 12px 32px rgba(13,159,138,0.1)}
            .pt-task:nth-child(2){animation-delay:0.06s}
            .pt-task:nth-child(3){animation-delay:0.12s}
            .pt-task:nth-child(4){animation-delay:0.18s}
            .pt-task:nth-child(5){animation-delay:0.24s}
            .pt-task:nth-child(6){animation-delay:0.30s}
            .pt-task-top{display:flex;align-items:center;justify-content:space-between}
            .pt-chip{font-size:11px;font-weight:700;padding:0.25rem 0.7rem;border-radius:999px;letter-spacing:0.03em}
            .pt-chip-diproses{background:#dbeafe;color:#1d4ed8}
            .pt-chip-menunggu{background:#fef3c7;color:#92400e}
            .pt-chip-selesai{background:#d1fae5;color:#065f46}
            .pt-task-id{font-size:11px;color:var(--soft);font-weight:600}
            .pt-task-title{font-family:'Sora',sans-serif;font-size:0.97rem;font-weight:700;color:var(--slate);line-height:1.4}
            .pt-task-desc{font-size:0.79rem;color:var(--mid);line-height:1.65;margin-top:0.4rem}
            .pt-task-loc{display:flex;align-items:center;gap:0.4rem;font-size:0.78rem;color:var(--soft)}
            .pt-task-loc svg{width:14px;height:14px;flex-shrink:0}
            .pt-divider{height:1px;background:var(--border)}
            .pt-task-footer{display:flex;align-items:center;justify-content:space-between;gap:0.75rem}
            .pt-reporter{display:flex;align-items:center;gap:0.6rem}
            .pt-avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#0d9f8a,#0ea5e9);display:flex;align-items:center;justify-content:center;font-family:'Sora',sans-serif;font-size:0.72rem;font-weight:700;color:#fff;flex-shrink:0}
            .pt-reporter-name{font-size:0.8rem;font-weight:600;color:var(--slate)}
            .pt-reporter-role{font-size:11px;color:var(--soft)}
            .pt-btn{flex-shrink:0;font-family:'Sora',sans-serif;font-size:0.78rem;font-weight:700;color:#fff;background:linear-gradient(135deg,var(--teal-dk),var(--teal));border:none;border-radius:0.65rem;padding:0.5rem 1rem;cursor:pointer;text-decoration:none;display:inline-block;transition:opacity 0.15s,transform 0.1s;white-space:nowrap}
            .pt-btn:hover{opacity:0.88}
            .pt-btn:active{transform:scale(0.97)}

            /* EMPTY */
            .pt-empty{grid-column:1/-1;background:var(--white);border-radius:var(--r-sm);border:1px solid var(--border);padding:4rem 2rem;text-align:center}
            .pt-empty-icon{width:64px;height:64px;border-radius:1.25rem;background:var(--teal-lt);display:flex;align-items:center;justify-content:center;margin:0 auto 1.25rem}
            .pt-empty-icon svg{width:30px;height:30px;color:var(--teal-dk)}
            .pt-empty h3{font-family:'Sora',sans-serif;font-size:1.1rem;font-weight:700;color:var(--slate);margin-bottom:0.4rem}
            .pt-empty p{font-size:0.83rem;color:var(--mid)}

            /* ANIMATION */
            @keyframes pt-fadeup{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
            .pt-hero{animation:pt-fadeup 0.35s ease}
            .pt-stat-grid{animation:pt-fadeup 0.4s ease}
        </style>

        <div class="pt-wrap">
            <div class="pt-page">

                {{-- HERO --}}
                <section class="pt-hero">
                    <div class="pt-hero-dots"></div>
                    <div class="pt-hero-glow"></div>
                    <div class="pt-hero-left">
                        <p class="pt-eyebrow">
                            <span class="pt-eyebrow-dot"></span>
                            Petugas Kebersihan
                        </p>
                        <h1>Tugas Lapangan Hari Ini</h1>
                        <p class="pt-hero-desc">Pantau tugas terverifikasi, update hasil penanganan, dan tetap cepat dalam merespon laporan masyarakat.</p>
                    </div>
                    <div class="pt-hero-right">
                        <div class="pt-date-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V8H3v11a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="pt-date-val">{{ now()->translatedFormat('d M Y') }}</p>
                        <p class="pt-date-lbl">Tanggal Hari Ini</p>
                    </div>
                </section>

                {{-- STAT CARDS --}}
                <div class="pt-stat-grid">
                    <div class="pt-stat green">
                        <div>
                            <p class="pt-stat-lbl">Verifikasi Selesai</p>
                            <p class="pt-stat-num">{{ $processing }}</p>
                            <p class="pt-stat-desc">Laporan diproses admin, siap diterima petugas.</p>
                        </div>
                        <div class="pt-stat-icon green">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                    </div>
                    <div class="pt-stat blue">
                        <div>
                            <p class="pt-stat-lbl">Sedang Berjalan</p>
                            <p class="pt-stat-num">{{ $responses }}</p>
                            <p class="pt-stat-desc">Catatan penanganan yang sedang dibuat.</p>
                        </div>
                        <div class="pt-stat-icon blue">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="pt-stat purple">
                        <div>
                            <p class="pt-stat-lbl">Selesai</p>
                            <p class="pt-stat-num">{{ $completed }}</p>
                            <p class="pt-stat-desc">Laporan ditutup, dapat dilihat masyarakat.</p>
                        </div>
                        <div class="pt-stat-icon purple">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- TASK LIST --}}
                <div>
                    <div class="pt-section-head">
                        <div>
                            <h2 class="pt-section-title">Daftar Tugas</h2>
                            <p class="pt-section-sub">Laporan yang sudah diverifikasi dan siap ditangani.</p>
                        </div>
                        <div class="pt-filter">
                            <button class="pt-ftab active" data-filter="semua">Semua</button>
                            <button class="pt-ftab" data-filter="diproses">Diproses</button>
                            <button class="pt-ftab" data-filter="menunggu">Menunggu</button>
                            <button class="pt-ftab" data-filter="selesai">Selesai</button>
                        </div>
                    </div>

                    <div class="pt-task-grid" id="pt-task-grid">
                        @forelse($laporans as $laporan)
                            <div class="pt-task" data-status="{{ $laporan->status }}">
                                <div class="pt-task-top">
                                    <span class="pt-chip pt-chip-{{ $laporan->status }}">{{ ucfirst($laporan->status) }}</span>
                                    <span class="pt-task-id">#{{ $laporan->id }}</span>
                                </div>
                                <div>
                                    <h3 class="pt-task-title">{{ Str::limit($laporan->judul, 55) }}</h3>
                                    <p class="pt-task-desc">{{ Str::limit($laporan->deskripsi, 110) }}</p>
                                </div>
                                <div class="pt-task-loc">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $laporan->lokasi }}
                                </div>
                                <div class="pt-divider"></div>
                                <div class="pt-task-footer">
                                    <div class="pt-reporter">
                                        <div class="pt-avatar">{{ strtoupper(substr($laporan->user->name, 0, 2)) }}</div>
                                        <div>
                                            <p class="pt-reporter-name">{{ $laporan->user->name }}</p>
                                            <p class="pt-reporter-role">Pelapor</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('laporans.show', $laporan) }}" class="pt-btn">Update →</a>
                                </div>
                            </div>
                        @empty
                            <div class="pt-empty">
                                <div class="pt-empty-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3>Tidak ada tugas</h3>
                                <p>Semua laporan sudah ditangani atau belum diverifikasi.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

        <script>
            document.querySelectorAll('.pt-ftab').forEach(function(tab) {
                tab.addEventListener('click', function() {
                    document.querySelectorAll('.pt-ftab').forEach(function(t) { t.classList.remove('active'); });
                    tab.classList.add('active');
                    var filter = tab.getAttribute('data-filter');
                    document.querySelectorAll('.pt-task').forEach(function(card) {
                        card.style.display = (filter === 'semua' || card.getAttribute('data-status') === filter) ? '' : 'none';
                    });
                });
            });
        </script>

    </div>
</x-app-layout>