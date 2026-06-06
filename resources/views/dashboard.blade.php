<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Laporan Saya | SIPANTAU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* ── RESET & BASE ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #eef2f7; color: #1e293b; min-height: 100vh; }
        h1,h2,h3,h4 { font-family: 'Sora', sans-serif; }

        /* ── VARIABLES ── */
        :root {
            --teal:    #0d9f8a;
            --teal-lt: #e4f7f5;
            --teal-dk: #076e60;
            --sky:     #0ea5e9;
            --navy:    #0b1d35;
            --slate:   #1e293b;
            --mid:     #475569;
            --soft:    #94a3b8;
            --border:  #e2e8f0;
            --white:   #ffffff;
            --r:       1.25rem;
        }

        /* ── LAYOUT SHELL ── */
        .shell { display: flex; flex-direction: column; min-height: 100vh; }

        /* ── TOP BAR ── */
        .topbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            padding: 0 2rem;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .topbar-logo {
            width: 34px; height: 34px;
            border-radius: 0.6rem;
            background: linear-gradient(135deg, var(--teal), var(--sky));
            display: flex; align-items: center; justify-content: center;
        }
        .topbar-logo svg { width: 18px; height: 18px; color: #fff; }
        .topbar-name {
            font-family: 'Sora', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: 0.04em;
        }
        .topbar-right { display: flex; align-items: center; gap: 0.75rem; }
        .topbar-icon-btn {
            width: 36px; height: 36px;
            border-radius: 0.6rem;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer;
            transition: background 0.15s;
        }
        .topbar-icon-btn:hover { background: rgba(255,255,255,0.13); }
        .topbar-icon-btn svg { width: 17px; height: 17px; color: rgba(255,255,255,0.75); }
        .topbar-avatar {
            width: 36px; height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal), var(--sky));
            display: flex; align-items: center; justify-content: center;
            font-family: 'Sora', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
        }

        /* ── PAGE CONTENT ── */
        .page-content { flex: 1; overflow: auto; }
        .page-inner { max-width: 1280px; margin: 0 auto; padding: 1.75rem 2rem; display: flex; flex-direction: column; gap: 1.5rem; }

        /* ── HERO BANNER ── */
        .hero-banner {
            border-radius: var(--r);
            background: var(--navy);
            overflow: hidden;
            position: relative;
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: stretch;
            animation: fadeUp 0.35s ease;
        }
        .hero-dots {
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 26px 26px;
        }
        .hero-glow {
            position: absolute; top: -90px; right: 220px;
            width: 340px; height: 340px; border-radius: 50%;
            background: radial-gradient(circle, rgba(13,159,138,0.22) 0%, transparent 70%);
        }
        .hero-left { position: relative; z-index: 1; padding: 2rem 2rem; }
        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 0.5rem;
            font-size: 10px; letter-spacing: 0.28em; text-transform: uppercase;
            color: var(--teal); font-weight: 700; margin-bottom: 0.8rem;
        }
        .hero-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--teal); animation: blink 2s ease-in-out infinite; }
        @keyframes blink { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.4;transform:scale(0.7)} }
        .hero-banner h1 { font-size: clamp(1.4rem, 2.8vw, 2rem); font-weight: 800; color: #fff; line-height: 1.25; max-width: 460px; }
        .hero-sub { font-size: 0.83rem; color: rgba(255,255,255,0.58); margin-top: 0.65rem; line-height: 1.75; max-width: 400px; }
        .hero-right {
            position: relative; z-index: 1;
            background: rgba(255,255,255,0.04);
            border-left: 1px solid rgba(255,255,255,0.07);
            padding: 2rem;
            display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 0.5rem;
            min-width: 160px;
        }
        .stat-glass {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 0.85rem;
            padding: 0.85rem 1.1rem;
            text-align: center;
            min-width: 110px;
        }
        .stat-glass-lbl { font-size: 9px; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(255,255,255,0.5); }
        .stat-glass-num { font-family: 'Sora', sans-serif; font-size: 1.9rem; font-weight: 800; color: #fff; margin-top: 0.25rem; line-height: 1; }
        @media(max-width:768px) {
            .hero-banner { grid-template-columns: 1fr; }
            .hero-right { border-left: none; border-top: 1px solid rgba(255,255,255,0.07); flex-direction: row; flex-wrap: wrap; justify-content: flex-start; gap: 0.75rem; padding: 1.25rem 2rem; }
        }

        /* ── MAIN GRID ── */
        .main-grid {
            display: grid;
            grid-template-columns: 1fr 340px;
            gap: 1.5rem;
            align-items: start;
        }
        @media(max-width: 1024px) { .main-grid { grid-template-columns: 1fr; } }

        /* ── PANEL ── */
        .panel { background: var(--white); border-radius: var(--r); border: 1px solid var(--border); padding: 1.5rem; animation: fadeUp 0.4s ease; }
        .panel-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem; margin-bottom: 1.1rem; }
        .panel-title { font-family: 'Sora', sans-serif; font-size: 1rem; font-weight: 700; color: var(--slate); }
        .panel-sub { font-size: 0.77rem; color: var(--soft); margin-top: 2px; }
        .count-badge { background: #f1f5f9; border-radius: 999px; padding: 0.2rem 0.7rem; font-size: 0.77rem; font-weight: 600; color: var(--mid); white-space: nowrap; margin-top: 2px; }

        /* ── FILTER TABS ── */
        .filter-tabs { display: flex; gap: 0.3rem; background: #f1f5f9; border-radius: 0.7rem; padding: 0.22rem; margin-bottom: 1rem; }
        .ftab { flex: 1; border: none; background: none; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.77rem; font-weight: 600; color: var(--soft); padding: 0.32rem 0.6rem; border-radius: 0.5rem; cursor: pointer; transition: all 0.15s; white-space: nowrap; }
        .ftab.active { background: var(--white); color: var(--slate); box-shadow: 0 1px 4px rgba(0,0,0,0.08); }

        /* ── REPORT CARDS (wrapping @include) ── */
        /* These are applied on the wrapper divs around @include */
        .report-list { display: flex; flex-direction: column; gap: 0.85rem; }

        /* ── EMPTY STATE ── */
        .empty-box { background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: var(--r); padding: 3rem 1.5rem; text-align: center; }
        .empty-icon-wrap { width: 56px; height: 56px; border-radius: 1rem; background: var(--teal-lt); display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem; }
        .empty-icon-wrap svg { width: 26px; height: 26px; color: var(--teal-dk); }
        .empty-box h3 { font-family: 'Sora', sans-serif; font-size: 0.95rem; font-weight: 700; color: var(--slate); margin-bottom: 0.3rem; }
        .empty-box p { font-size: 0.8rem; color: var(--mid); }

        /* ── FORM PANEL ── */
        .form-panel { background: var(--white); border-radius: var(--r); border: 1px solid var(--border); padding: 1.5rem; position: sticky; top: 80px; animation: fadeUp 0.45s ease; }
        .form-panel h2 { font-family: 'Sora', sans-serif; font-size: 1rem; font-weight: 700; color: var(--slate); margin-bottom: 0.2rem; }
        .form-panel .fp-sub { font-size: 0.77rem; color: var(--soft); margin-bottom: 1.2rem; }

        /* Inject form element styles so @include('partials.report-form') looks great */
        /* These classes target elements that report-form partial likely uses */
        .form-panel label,
        .form-panel .block.text-sm { display: block; font-size: 0.77rem; font-weight: 600; color: var(--mid); margin-bottom: 0.32rem; }
        .form-panel input[type="text"],
        .form-panel input[type="email"],
        .form-panel textarea,
        .form-panel select {
            width: 100%; padding: 0.6rem 0.85rem;
            border: 1px solid #cbd5e1; border-radius: 0.7rem;
            font-family: 'Plus Jakarta Sans', sans-serif; font-size: 0.84rem; color: var(--slate);
            background: #f8fafc; outline: none;
            transition: border 0.15s, box-shadow 0.15s;
            margin-bottom: 0;
        }
        .form-panel input:focus, .form-panel textarea:focus, .form-panel select:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(13,159,138,0.12);
        }
        .form-panel textarea { resize: vertical; min-height: 90px; }
        .form-panel .mt-1, .form-panel .mt-2 { margin-top: 0.5rem; }
        .form-panel .mb-4, .form-panel .mb-3 { margin-bottom: 1rem; }
        .form-panel .space-y-4 > * + * { margin-top: 1rem; }
        .form-panel .space-y-3 > * + * { margin-top: 0.75rem; }

        /* Upload zone */
        .form-panel .border-dashed,
        .form-panel [class*="border-dashed"] {
            border: 2px dashed #cbd5e1 !important;
            border-radius: 0.7rem !important;
            padding: 1rem !important;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background: #fafafa;
        }
        .form-panel .border-dashed:hover { border-color: var(--teal) !important; background: var(--teal-lt) !important; }

        /* Submit button */
        .form-panel button[type="submit"],
        .form-panel .btn-submit,
        .form-panel input[type="submit"] {
            width: 100%; padding: 0.72rem;
            background: linear-gradient(135deg, var(--teal-dk), var(--teal));
            color: #fff; font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.88rem;
            border: none; border-radius: 0.8rem; cursor: pointer;
            transition: opacity 0.15s, transform 0.1s;
            margin-top: 0.25rem;
        }
        .form-panel button[type="submit"]:hover { opacity: 0.88; }
        .form-panel button[type="submit"]:active { transform: scale(0.98); }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
    </style>
</head>
<body>
<div class="shell">

    {{-- TOP BAR --}}
    <header class="topbar">
        <div class="topbar-brand">
            <div class="topbar-logo">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="topbar-name">SIPANTAU</span>
        </div>
        <div class="topbar-right">
            <div class="topbar-icon-btn" title="Notifikasi">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </div>
            <div class="topbar-avatar" title="{{ Auth::user()->name ?? 'Pengguna' }}">
                {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 2)) }}
            </div>
        </div>
    </header>

    {{-- SCROLLABLE CONTENT --}}
    <main class="page-content">
        <div class="page-inner">

            {{-- HERO BANNER --}}
            <section class="hero-banner">
                <div class="hero-dots"></div>
                <div class="hero-glow"></div>
                <div class="hero-left">
                    <p class="hero-eyebrow"><span class="hero-dot"></span>Halo, {{ Auth::user()->name ?? 'Pengguna' }}</p>
                    <h1>Pantau Laporan dan Penanganan Lingkungan</h1>
                    <p class="hero-sub">Lihat ringkasan laporan Anda, pantau status penanganan, dan terus berkontribusi untuk lingkungan yang lebih bersih.</p>
                </div>
                <div class="hero-right">
                    <div class="stat-glass">
                        <p class="stat-glass-lbl">Total</p>
                        <p class="stat-glass-num">{{ $laporans->count() }}</p>
                    </div>
                    <div class="stat-glass">
                        <p class="stat-glass-lbl">Diproses</p>
                        <p class="stat-glass-num">{{ $laporans->where('status','diproses')->count() }}</p>
                    </div>
                    <div class="stat-glass">
                        <p class="stat-glass-lbl">Selesai</p>
                        <p class="stat-glass-num">{{ $laporans->where('status','selesai')->count() }}</p>
                    </div>
                </div>
            </section>

            {{-- MAIN 2-COLUMN GRID --}}
            <div class="main-grid">

                {{-- KIRI: daftar laporan --}}
                <div class="panel">
                    <div class="panel-head">
                        <div>
                            <p class="panel-title">Laporan Saya</p>
                            <p class="panel-sub">Lihat status terbaru laporan yang sudah dikirim.</p>
                        </div>
                        <span class="count-badge">{{ $laporans->count() }} laporan</span>
                    </div>

                    {{-- Filter tabs --}}
                    <div class="filter-tabs" id="filter-tabs">
                        <button class="ftab active" data-filter="semua">Semua</button>
                        <button class="ftab" data-filter="menunggu">Menunggu</button>
                        <button class="ftab" data-filter="diproses">Diproses</button>
                        <button class="ftab" data-filter="selesai">Selesai</button>
                    </div>

                    {{-- Report list --}}
                    <div class="report-list" id="report-list">
                        @forelse($laporans as $laporan)
                            <div data-status="{{ $laporan->status }}" style="animation: fadeUp 0.35s ease {{ $loop->index * 0.06 }}s both;">
                                @include('partials.report-card', ['laporan' => $laporan])
                            </div>
                        @empty
                            <div class="empty-box">
                                <div class="empty-icon-wrap">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3>Belum ada laporan</h3>
                                <p>Gunakan form di samping untuk membuat laporan baru.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- KANAN: form laporan --}}
                <div class="form-panel">
                    <h2>Buat Laporan Baru</h2>
                    <p class="fp-sub">Laporkan masalah lingkungan di sekitar Anda.</p>
                    @include('partials.report-form')
                </div>

            </div>
        </div>
    </main>
</div>

<script>
    // Filter tabs
    document.querySelectorAll('.ftab').forEach(function(tab) {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.ftab').forEach(function(t) { t.classList.remove('active'); });
            tab.classList.add('active');
            var filter = tab.getAttribute('data-filter');
            document.querySelectorAll('#report-list > [data-status]').forEach(function(card) {
                card.style.display = (filter === 'semua' || card.getAttribute('data-status') === filter) ? '' : 'none';
            });
        });
    });

    // Drag & drop upload zone
    var fileInput = document.getElementById('photo');
    var dropZone  = fileInput && fileInput.parentElement && fileInput.parentElement.parentElement;
    if (dropZone) {
        ['dragenter','dragover','dragleave','drop'].forEach(function(e) {
            dropZone.addEventListener(e, function(ev) { ev.preventDefault(); ev.stopPropagation(); });
        });
        ['dragenter','dragover'].forEach(function(e) {
            dropZone.addEventListener(e, function() { dropZone.classList.add('border-emerald-500','bg-emerald-50'); });
        });
        ['dragleave','drop'].forEach(function(e) {
            dropZone.addEventListener(e, function() { dropZone.classList.remove('border-emerald-500','bg-emerald-50'); });
        });
        dropZone.addEventListener('drop', function(e) { fileInput.files = e.dataTransfer.files; });
    }
</script>
</body>
</html>