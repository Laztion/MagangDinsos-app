<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Magang Dinsos</title>
    <meta name="description" content="Portal resmi sistem informasi program magang Dinas Sosial. Kelola, pantau, dan daftarkan program magang dengan mudah.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #1d4ed8;
            --primary-light: #3b82f6;
            --primary-dark: #1e3a8a;
            --accent: #06b6d4;
            --accent2: #8b5cf6;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-400: #94a3b8;
            --gray-600: #475569;
            --gray-900: #0f172a;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-900);
            color: var(--white);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── Animated Background ── */
        .bg-scene {
            position: fixed;
            inset: 0;
            z-index: 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #0f172a 100%);
            overflow: hidden;
        }

        .bg-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            animation: float 12s ease-in-out infinite alternate;
        }

        .blob-1 {
            width: 600px; height: 600px;
            background: radial-gradient(circle, #3b82f6, #1d4ed8);
            top: -200px; left: -150px;
            animation-delay: 0s;
        }
        .blob-2 {
            width: 500px; height: 500px;
            background: radial-gradient(circle, #8b5cf6, #6d28d9);
            bottom: -150px; right: -100px;
            animation-delay: 3s;
        }
        .blob-3 {
            width: 350px; height: 350px;
            background: radial-gradient(circle, #06b6d4, #0284c7);
            top: 50%; left: 55%;
            animation-delay: 6s;
        }

        @keyframes float {
            0%   { transform: translate(0, 0) scale(1); }
            50%  { transform: translate(40px, -40px) scale(1.05); }
            100% { transform: translate(-20px, 30px) scale(0.97); }
        }

        /* Grid overlay */
        .bg-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* ── Layout ── */
        .page-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── Navbar ── */
        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 2.5rem;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            background: rgba(15, 23, 42, 0.6);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .nav-logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary-light), var(--accent2));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(59,130,246,0.4);
        }

        .nav-brand-text {
            font-size: 1rem;
            font-weight: 700;
            color: var(--white);
            line-height: 1.2;
        }

        .nav-brand-sub {
            font-size: 0.7rem;
            font-weight: 400;
            color: var(--gray-400);
            letter-spacing: 0.05em;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.6rem 1.4rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.25s ease;
            letter-spacing: 0.01em;
            white-space: nowrap;
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            border: 1.5px solid rgba(255,255,255,0.2);
        }
        .btn-outline:hover {
            background: rgba(255,255,255,0.08);
            border-color: rgba(255,255,255,0.4);
            transform: translateY(-1px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            color: var(--white);
            box-shadow: 0 4px 15px rgba(59,130,246,0.35);
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #60a5fa, var(--primary-light));
            box-shadow: 0 6px 20px rgba(59,130,246,0.5);
            transform: translateY(-2px);
        }

        .btn-xl {
            padding: 0.9rem 2.2rem;
            font-size: 1rem;
            border-radius: 10px;
        }

        .btn-xl-outline {
            padding: 0.875rem 2rem;
            font-size: 1rem;
            border-radius: 10px;
            background: rgba(255,255,255,0.06);
            color: var(--white);
            border: 1.5px solid rgba(255,255,255,0.18);
        }
        .btn-xl-outline:hover {
            background: rgba(255,255,255,0.12);
            border-color: rgba(255,255,255,0.35);
            transform: translateY(-2px);
        }

        /* ── Hero Section ── */
        .hero {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 5rem 1.5rem 4rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.45rem 1.1rem;
            border-radius: 999px;
            background: rgba(59,130,246,0.12);
            border: 1px solid rgba(59,130,246,0.3);
            color: #93c5fd;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            margin-bottom: 2rem;
            animation: fadeInDown 0.6s ease both;
        }

        .badge-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #60a5fa;
            animation: pulse-dot 2s ease infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.5; transform: scale(1.4); }
        }

        .hero-title {
            font-size: clamp(2.4rem, 6vw, 4.5rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -0.03em;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.7s ease 0.1s both;
        }

        .gradient-text {
            background: linear-gradient(135deg, #93c5fd, #a78bfa, #67e8f9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            max-width: 580px;
            font-size: 1.1rem;
            line-height: 1.7;
            color: #94a3b8;
            margin-bottom: 2.8rem;
            animation: fadeInUp 0.7s ease 0.2s both;
        }

        .hero-cta {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 0.7s ease 0.3s both;
        }

        /* ── Stats Strip ── */
        .stats-strip {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            margin-top: 4rem;
            padding-top: 3rem;
            border-top: 1px solid rgba(255,255,255,0.07);
            animation: fadeInUp 0.7s ease 0.4s both;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #60a5fa, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1;
        }

        .stat-label {
            font-size: 0.8rem;
            color: var(--gray-400);
            margin-top: 0.35rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        /* ── Feature Cards ── */
        .features {
            padding: 4rem 1.5rem 5rem;
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        .section-label {
            text-align: center;
            font-size: 0.78rem;
            font-weight: 700;
            color: #60a5fa;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 0.8rem;
        }

        .section-title {
            text-align: center;
            font-size: clamp(1.6rem, 3.5vw, 2.4rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
        }

        .section-desc {
            text-align: center;
            color: var(--gray-400);
            font-size: 0.95rem;
            max-width: 480px;
            margin: 0 auto 3rem;
            line-height: 1.65;
        }

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            padding: 1.8rem;
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(59,130,246,0.06), transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(99,102,241,0.3);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 1.2rem;
        }

        .icon-blue   { background: rgba(59,130,246,0.15); }
        .icon-purple { background: rgba(139,92,246,0.15); }
        .icon-cyan   { background: rgba(6,182,212,0.15);  }

        .card-title {
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--white);
        }

        .card-text {
            font-size: 0.875rem;
            color: var(--gray-400);
            line-height: 1.65;
        }

        /* ── CTA Banner ── */
        .cta-banner {
            margin: 0 1.5rem 5rem;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            background: linear-gradient(135deg, rgba(29,78,216,0.3), rgba(139,92,246,0.25));
            border: 1px solid rgba(99,102,241,0.25);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            backdrop-filter: blur(12px);
            position: relative;
            overflow: hidden;
        }

        .cta-banner::after {
            content: '';
            position: absolute;
            top: -50%;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 300px;
            background: radial-gradient(ellipse, rgba(99,102,241,0.12), transparent 70%);
            pointer-events: none;
        }

        .cta-banner h2 {
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            margin-bottom: 0.75rem;
        }

        .cta-banner p {
            color: var(--gray-400);
            font-size: 0.95rem;
            margin-bottom: 2rem;
            max-width: 420px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.65;
        }

        .cta-banner .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ── Footer ── */
        footer {
            border-top: 1px solid rgba(255,255,255,0.06);
            padding: 1.5rem 2.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .footer-copy {
            font-size: 0.8rem;
            color: var(--gray-400);
        }

        .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-links a {
            font-size: 0.8rem;
            color: var(--gray-400);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--white);
        }

        /* ── Keyframes ── */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-18px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(22px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── Responsive ── */
        @media (max-width: 640px) {
            nav { padding: 1rem 1.25rem; }
            .nav-brand-text { font-size: 0.85rem; }
            .hero { padding: 3.5rem 1.25rem 3rem; }
            .stats-strip { gap: 1.8rem; }
            footer { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>

<!-- Animated Background -->
<div class="bg-scene" aria-hidden="true">
    <div class="bg-grid"></div>
    <div class="bg-blob blob-1"></div>
    <div class="bg-blob blob-2"></div>
    <div class="bg-blob blob-3"></div>
</div>

<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Navbar -->
    <nav>
        <a href="/" class="nav-brand">
            <div class="nav-logo-icon" aria-hidden="true">🏛️</div>
            <div>
                <div class="nav-brand-text">SiMagang Dinsos</div>
                <div class="nav-brand-sub">Dinas Sosial</div>
            </div>
        </a>

        <div class="nav-actions">
            <a href="/riwayat-magang" class="btn btn-outline" style="border-color: transparent; padding-left: 0.5rem; padding-right: 0.5rem;" id="nav-history-btn">
                Riwayat Magang
            </a>
            @auth
                <a href="/admin" class="btn btn-primary" id="nav-dashboard-btn">
                    Dashboard →
                </a>
            @else
                <a href="/admin/login" class="btn btn-outline" id="nav-login-btn">
                    Masuk
                </a>
                <a href="/admin/register" class="btn btn-primary" id="nav-register-btn">
                    Daftar Sekarang
                </a>
            @endauth
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="hero">
        <div class="badge">
            <span class="badge-dot"></span>
            Portal Magang Resmi
        </div>

        <h1 class="hero-title">
            Sistem Informasi<br>
            <span class="gradient-text">Magang Dinas Sosial</span>
        </h1>

        <p class="hero-desc">
            Platform terpadu untuk pengelolaan program magang di lingkungan Dinas Sosial.
            Daftar, pantau progres, dan kelola laporan magang dengan mudah dan efisien.
        </p>

        <div class="hero-cta">
            @guest
                <a href="/admin/register" class="btn btn-primary btn-xl" id="hero-register-btn">
                    Daftar Magang
                </a>
                <a href="/admin/login" class="btn btn-xl-outline" id="hero-login-btn">
                    Sudah punya akun? Masuk
                </a>
            @else
                <a href="/admin" class="btn btn-primary btn-xl" id="hero-dashboard-btn">
                    Buka Dashboard →
                </a>
            @endguest
        </div>

        <!-- Stats -->
        <div class="stats-strip">
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Peserta Magang</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">30+</div>
                <div class="stat-label">Unit Kerja</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Kepuasan Peserta</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">5★</div>
                <div class="stat-label">Rating Platform</div>
            </div>
        </div>
    </section>

    <!-- Feature Cards -->
    <section class="features" id="fitur">
        <p class="section-label">Fitur Unggulan</p>
        <h2 class="section-title">Semua yang Anda butuhkan</h2>
        <p class="section-desc">
            Dirancang untuk memudahkan proses magang dari awal pendaftaran hingga selesai.
        </p>

        <div class="cards-grid">
            <div class="card">
                <div class="card-icon icon-blue">📋</div>
                <div class="card-title">Pendaftaran Online</div>
                <p class="card-text">
                    Daftar program magang secara online tanpa perlu datang langsung. Proses cepat, mudah, dan terverifikasi secara digital.
                </p>
            </div>
            <div class="card">
                <div class="card-icon icon-purple">📊</div>
                <div class="card-title">Pantau Progres</div>
                <p class="card-text">
                    Lacak perkembangan magang secara real-time. Lihat jadwal, absensi, dan penilaian dalam satu dashboard terintegrasi.
                </p>
            </div>
            <div class="card">
                <div class="card-icon icon-cyan">📄</div>
                <div class="card-title">Laporan Digital</div>
                <p class="card-text">
                    Buat dan kumpulkan laporan magang secara digital. Hemat kertas dan waktu dengan manajemen dokumen yang terstruktur.
                </p>
            </div>
        </div>
    </section>

    <!-- CTA Banner -->
    <div class="cta-banner" id="cta">
        <h2>Siap untuk memulai<br><span class="gradient-text">perjalanan magang Anda?</span></h2>
        <p>Bergabunglah bersama ratusan peserta magang yang telah merasakan kemudahan platform kami.</p>
        <div class="cta-buttons">
            @guest
                <a href="/admin/register" class="btn btn-primary btn-xl" id="cta-register-btn">
                    🎯 Daftar Sekarang — Gratis
                </a>
                <a href="/admin/login" class="btn btn-xl-outline" id="cta-login-btn">
                    Masuk ke Akun
                </a>
            @else
                <a href="/admin" class="btn btn-primary btn-xl" id="cta-dashboard-btn">
                    Buka Dashboard →
                </a>
            @endguest
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <span class="footer-copy">© {{ date('Y') }} Dinas Sosial — Sistem Informasi Magang</span>
        <div class="footer-links">
            <a href="#">Panduan</a>
            <a href="#">Kontak</a>
            <a href="#">Kebijakan Privasi</a>
        </div>
    </footer>

</div>
</body>
</html>
