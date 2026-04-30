<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiMagang – Portal Magang Dinas Sosial</title>
    <meta name="description" content="Sistem Informasi Magang Dinas Sosial. Platform modern untuk mengelola program magang dengan efisien dan transparan.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Lenis Smooth Scroll -->
    <script src="https://unpkg.com/@studio-freight/lenis@1.0.34/dist/lenis.min.js"></script>

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                            950: '#022c22',
                        },
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        'pulse-soft': 'pulse-soft 4s ease-in-out infinite',
                        'blob': 'blob 7s infinite',
                        'slide-up': 'slide-up 0.8s ease-out forwards',
                        'fade-in': 'fade-in 1s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'pulse-soft': {
                            '0%, 100%': { opacity: 1, transform: 'scale(1)' },
                            '50%': { opacity: 0.8, transform: 'scale(1.05)' },
                        },
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        'slide-up': {
                            '0%': { transform: 'translateY(30px)', opacity: 0 },
                            '100%': { transform: 'translateY(0)', opacity: 1 },
                        },
                        'fade-in': {
                            '0%': { opacity: 0 },
                            '100%': { opacity: 1 },
                        },
                        'marquee': {
                            '0%': { transform: 'translateX(0)' },
                            '100%': { transform: 'translateX(-50%)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        @layer utilities {
            .glass {
                background: rgba(255, 255, 255, 0.7);
                backdrop-filter: blur(12px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
            .text-gradient {
                background: linear-gradient(135deg, #059669 0%, #10b981 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .animate-marquee {
                animation: marquee 40s linear infinite;
            }
            .pause {
                animation-play-state: paused;
            }
        }

        html, body {
            max-width: 100vw;
            overflow-x: hidden;
        }

        body {
            background-color: #f9fafb;
            scroll-behavior: smooth;
        }

        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: radial-gradient(circle at 50% 50%, #ecfdf5 0%, #f9fafb 100%);
            overflow: hidden;
        }

        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: #34d399;
            filter: blur(100px);
            border-radius: 50%;
            opacity: 0.3;
            z-index: -1;
            transition: transform 0.2s ease-out;
        }

        /* Hero Image Mask */
        .hero-mask {
            clip-path: polygon(10% 0, 100% 0%, 100% 100%, 0% 100%);
        }

        .tilt-card {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transform-style: preserve-3d;
        }
        .tilt-card:hover {
            transform: scale(1.03) rotateX(3deg) rotateY(3deg);
        }

        /* 4WIDE Inspired Effects */
        .noise-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 9999;
            opacity: 0.05;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        .viewport-glow {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 9998;
            box-shadow: inset 0 0 100px rgba(16, 185, 129, 0.1);
        }

        .lenis.lenis-smooth {
            scroll-behavior: auto !important;
        }

        .lenis.lenis-smooth [data-lenis-prevent] {
            overscroll-behavior: contain;
        }

        .lenis.lenis-stopped {
            overflow: hidden;
        }

        .section-number {
            font-family: 'Outfit', sans-serif;
            font-size: 10rem;
            font-weight: 900;
            line-height: 1;
            opacity: 0.03;
            position: absolute;
            top: -2rem;
            left: 0;
            user-select: none;
        }

        /* Anthony Tuccitto Inspired Grid */
        .grid-plus {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 40px 40px;
            position: relative;
        }
        .grid-plus::before {
            content: "+";
            position: absolute;
            top: -12px;
            left: -8px;
            font-size: 24px;
            color: #e5e7eb;
            opacity: 0.5;
        }

        .plus-bg {
            background-image: 
                linear-gradient(to right, #f3f4f6 1px, transparent 1px),
                linear-gradient(to bottom, #f3f4f6 1px, transparent 1px);
            background-size: 100px 100px;
        }

        .plus-marker {
            position: absolute;
            width: 10px;
            height: 10px;
            color: #d1d5db;
            font-family: serif;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="antialiased selection:bg-emerald-100 selection:text-emerald-900">
    
    <div class="noise-overlay"></div>
    <div class="viewport-glow"></div>
    
    <div class="animated-bg">
        <div class="blob animate-blob top-[-10%] left-[-10%] bg-emerald-300"></div>
        <div class="blob animate-blob top-[20%] right-[-10%] bg-emerald-200" style="animation-delay: 2s;"></div>
        <div class="blob animate-blob bottom-[-10%] left-[30%] bg-emerald-400" style="animation-delay: 4s;"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 px-6 py-4 flex items-center justify-between glass shadow-sm">
        <div class="flex items-center gap-2 group cursor-pointer">
            <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-transform">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <span class="text-xl font-bold tracking-tight text-gray-900">Si<span class="text-emerald-600">Magang</span></span>
        </div>
        
        <div class="hidden md:flex items-center gap-8 font-medium text-gray-600">
            <a href="#" class="hover:text-emerald-600 transition-colors">Beranda</a>
            <a href="#features" class="hover:text-emerald-600 transition-colors">Fitur</a>
            <a href="#riwayat" class="hover:text-emerald-600 transition-colors">Alumni</a>
        </div>

        <div class="flex items-center gap-3">
            @if (Route::has('filament.admin.auth.login'))
                @auth
                    <a href="{{ url('/admin') }}" class="px-5 py-2.5 bg-emerald-600 text-white rounded-xl font-semibold shadow-lg shadow-emerald-200 hover:bg-emerald-700 hover:scale-105 active:scale-95 transition-all">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('filament.admin.auth.login') }}" class="px-6 py-2.5 text-emerald-700 font-bold hover:text-emerald-800 transition-colors">
                        Masuk
                    </a>
                    @if (Route::has('filament.admin.auth.register'))
                        <a href="{{ route('filament.admin.auth.register') }}" class="px-6 py-2.5 bg-emerald-600 text-white rounded-xl font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-700 hover:scale-105 active:scale-95 transition-all">
                            Daftar
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 px-6 overflow-hidden min-h-screen flex items-center">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-8 relative z-10" data-aos="fade-right" data-aos-duration="1200">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-bold animate-pulse-soft border border-emerald-200">
                    <span class="mr-2">🎉</span> Batch Pendaftaran 2026 Dibuka
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-black text-gray-900 leading-[1.1] tracking-tight">
                    Mulai Magang <br/>
                    <span class="text-gradient break-words">Profesional</span> <br/>
                    dengan SiMagang
                </h1>
                
                <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                    Platform resmi pendaftaran dan pengelolaan program magang. Bangun masa depanmu dengan pengalaman nyata berkontribusi untuk masyarakat.
                </p>

                <div class="flex flex-wrap gap-4">
                    @if (Route::has('filament.admin.auth.register'))
                        <a href="{{ route('filament.admin.auth.register') }}" class="px-8 py-4 bg-emerald-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-emerald-200 hover:bg-emerald-700 hover:-translate-y-1 transition-all group">
                            Mulai Daftar Sekarang
                            <svg class="w-5 h-5 inline-block ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    @endif
                    <a href="#features" class="px-8 py-4 bg-white text-gray-700 rounded-2xl font-bold text-lg border border-gray-200 hover:border-emerald-300 hover:text-emerald-700 transition-all">
                        Pelajari Fitur
                    </a>
                </div>

                <div class="pt-8 flex items-center gap-6">
                    <div class="flex -space-x-3">
                        <img class="w-12 h-12 rounded-full border-4 border-white shadow-sm" src="https://ui-avatars.com/api/?name=A" alt="">
                        <img class="w-12 h-12 rounded-full border-4 border-white shadow-sm" src="https://ui-avatars.com/api/?name=B" alt="">
                        <img class="w-12 h-12 rounded-full border-4 border-white shadow-sm" src="https://ui-avatars.com/api/?name=C" alt="">
                        <div class="w-12 h-12 rounded-full border-4 border-white bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm shadow-sm">
                            +500
                        </div>
                    </div>
                    <p class="text-sm text-gray-500 font-medium">Mahasiswa telah bergabung <br/> di program magang kami.</p>
                </div>
            </div>

            <div class="relative hidden lg:block" data-aos="zoom-in" data-aos-delay="300">
                <div class="absolute inset-0 bg-emerald-200 rounded-[3rem] rotate-6 scale-95 opacity-50 blur-2xl"></div>
                <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white animate-float tilt-card">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&q=80&w=2070" class="w-full h-full object-cover aspect-square" alt="Team">
                </div>
                
                <!-- Floating Elements -->
                <div class="absolute -top-10 -right-10 glass p-6 rounded-2xl shadow-xl animate-float-delayed flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-black text-gray-900">Validasi Cepat</p>
                        <p class="text-xs text-gray-500">QR Code Terintegrasi</p>
                    </div>
                </div>

                <div class="absolute -bottom-10 -left-10 glass p-6 rounded-2xl shadow-xl animate-float flex items-center gap-4">
                    <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 font-black">
                        100%
                    </div>
                    <div>
                        <p class="text-sm font-black text-gray-900">Digitalisasi</p>
                        <p class="text-xs text-gray-500">Tanpa Kertas & Efisien</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-32 px-6 bg-white relative">
        <div class="section-number">01</div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row justify-between items-end gap-8 mb-24">
                <div class="max-w-2xl">
                    <h2 class="text-emerald-600 font-black tracking-[0.2em] uppercase mb-6 flex items-center gap-4" data-aos="fade-right">
                        <span class="w-12 h-[2px] bg-emerald-600"></span>
                        Fitur Utama
                    </h2>
                    <h3 class="text-4xl md:text-5xl lg:text-7xl font-black text-gray-900 leading-[1.1] break-words" data-aos="fade-up" data-aos-delay="100">
                        Digitalisasi <br/> Pengalaman Magang.
                    </h3>
                </div>
                <p class="text-xl text-gray-500 max-w-sm mb-4" data-aos="fade-left" data-aos-delay="200">
                    Kami mendefinisikan ulang cara mahasiswa berinteraksi dengan dunia kerja di instansi pemerintah.
                </p>
            </div>
            
            <div class="grid lg:grid-cols-12 gap-12">
                <!-- Card 1 -->
                <div class="lg:col-span-4 p-12 rounded-[3rem] bg-gray-50 border border-gray-100 hover:border-emerald-200 transition-all duration-500 group tilt-card" data-aos="fade-up">
                    <div class="w-20 h-20 bg-white rounded-3xl flex items-center justify-center text-emerald-600 shadow-xl mb-12 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-500 group-hover:rotate-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                    </div>
                    <h4 class="text-3xl font-black text-gray-900 mb-6">Pendaftaran <br/> Tanpa Batas.</h4>
                    <p class="text-gray-500 text-lg leading-relaxed">Sistem pendaftaran satu pintu yang memudahkan aksesibilitas bagi seluruh mahasiswa di Indonesia.</p>
                </div>

                <!-- Card 2 -->
                <div class="lg:col-span-8 p-12 rounded-[3rem] bg-emerald-600 text-white shadow-3xl shadow-emerald-900/20 hover:scale-[1.02] transition-all duration-500 group tilt-card relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -mr-32 -mt-32"></div>
                    <div class="relative z-10 h-full flex flex-col justify-between">
                        <div class="w-20 h-20 bg-white/20 rounded-3xl flex items-center justify-center text-white mb-12">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/></svg>
                        </div>
                        <div>
                            <h4 class="text-3xl md:text-4xl lg:text-5xl font-black mb-6">E-ID Card & <br/> Integrasi QR Code.</h4>
                            <p class="text-white/80 text-xl leading-relaxed max-w-xl">Identitas digital otomatis untuk akses absensi dan validasi kehadiran secara real-time di seluruh unit kerja.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="lg:col-span-12 p-12 rounded-[3rem] bg-gray-900 text-white hover:bg-black transition-all duration-700 group tilt-card flex flex-col lg:flex-row items-center gap-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="lg:w-1/2">
                        <div class="w-20 h-20 bg-emerald-600 rounded-3xl flex items-center justify-center text-white mb-12 shadow-lg shadow-emerald-900/50">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        </div>
                        <h4 class="text-3xl md:text-4xl lg:text-5xl font-black mb-6 text-gradient">Laporan & Penilaian <br/> Real-time Terpusat.</h4>
                        <p class="text-gray-400 text-xl leading-relaxed">Dashboard transparan untuk memantau progres, nilai, dan umpan balik pembimbing secara langsung.</p>
                    </div>
                    <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                        <div class="h-40 bg-white/5 rounded-2xl border border-white/10 flex flex-col items-center justify-center group-hover:bg-emerald-600/10 group-hover:border-emerald-600/30 transition-all">
                            <span class="text-3xl font-black text-emerald-500">500+</span>
                            <span class="text-sm text-gray-400">Mahasiswa</span>
                        </div>
                        <div class="h-40 bg-white/5 rounded-2xl border border-white/10 flex flex-col items-center justify-center group-hover:bg-emerald-600/10 group-hover:border-emerald-600/30 transition-all">
                            <span class="text-3xl font-black text-emerald-500">100%</span>
                            <span class="text-sm text-gray-400">Digital</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Riwayat Magang Section -->
    <section id="riwayat" class="py-40 bg-white relative plus-bg">
        <a href="#riwayat"></a>
        <!-- Plus Markers -->
        <div class="plus-marker top-[100px] left-[100px]">+</div>
        <div class="plus-marker top-[100px] right-[100px]">+</div>
        <div class="plus-marker bottom-[100px] left-[100px]">+</div>
        <div class="plus-marker bottom-[100px] right-[100px]">+</div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-32" data-aos="fade-up">
                <h2 class="text-emerald-600 font-black tracking-[0.4em] uppercase mb-8 flex items-center gap-6">
                    <span class="w-16 h-[2px] bg-emerald-600"></span>
                    Alumni Story
                </h2>
                <h3 class="text-5xl md:text-6xl lg:text-9xl font-black text-gray-900 leading-[0.9] tracking-tighter uppercase break-words">
                    Our <br/> Graduates.
                </h3>
            </div>

            <div class="space-y-40">
                @forelse($riwayats as $riwayat)
                    <div class="grid lg:grid-cols-12 gap-12 items-start group" data-aos="fade-up">
                        <div class="lg:col-span-7 {{ $loop->even ? 'lg:order-last' : '' }}">
                            <div class="relative overflow-hidden rounded-2xl shadow-2xl tilt-card">
                                @php
                                    $fotoUrl = $riwayat->mahasiswa?->foto 
                                        ? asset('storage/' . $riwayat->mahasiswa->foto) 
                                        : "https://ui-avatars.com/api/?name=" . urlencode($riwayat->mahasiswa?->nama ?? 'M') . "&color=FFFFFF&background=059669";
                                @endphp
                                <img src="{{ $fotoUrl }}" 
                                     class="w-full aspect-[16/10] object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-105 group-hover:scale-100" 
                                     alt="Student">
                                <div class="absolute inset-0 bg-emerald-900/10 group-hover:bg-transparent transition-colors duration-700"></div>
                            </div>
                        </div>
                        
                        <div class="lg:col-span-5 flex flex-col justify-center h-full pt-8 lg:pt-0">
                            <div class="mb-6 flex items-center gap-4 text-emerald-600 font-bold tracking-widest uppercase text-sm">
                                <span>{{ $riwayat->divisiTempat }}</span>
                                <span class="w-8 h-[1px] bg-emerald-200"></span>
                                <span>{{ \Carbon\Carbon::parse($riwayat->tanggalMulai)->format('Y') }}</span>
                            </div>
                            
                            <h4 class="text-3xl md:text-4xl lg:text-6xl font-black text-gray-900 uppercase leading-none mb-8 tracking-tighter group-hover:text-emerald-600 transition-colors break-words">
                                {{ $riwayat->mahasiswa?->nama ?? 'ALUMNI' }}
                            </h4>

                            <p class="text-xl text-gray-500 leading-relaxed mb-10 font-medium whitespace-normal">
                                "{{ $riwayat->catatan ?? 'Mendapatkan wawasan mendalam mengenai tata kelola pemerintahan digital selama program magang ini.' }}"
                            </p>

                            <div class="grid grid-cols-2 gap-8 border-t border-gray-100 pt-10">
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-2">Instansi</p>
                                    <p class="text-lg font-bold text-gray-900 uppercase">{{ $riwayat->namaPerusahaan }}</p>
                                </div>
                                <div>
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-gray-400 mb-2">Grade</p>
                                    <p class="text-lg font-bold text-emerald-600">{{ $riwayat->nilaiAkhir ?? 'DISTINCTION' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="py-20 text-center border-2 border-dashed border-gray-100 rounded-3xl">
                        <p class="text-gray-400 font-bold uppercase tracking-widest">No Stories Yet</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-40 text-center" data-aos="zoom-in">
                <a href="{{ route('filament.admin.auth.register') }}" class="group relative inline-flex items-center gap-4 lg:gap-8 text-xl md:text-2xl lg:text-4xl font-black uppercase tracking-tighter hover:text-emerald-600 transition-all">
                    Start Your Story
                    <div class="w-12 h-12 md:w-16 md:h-16 bg-emerald-600 rounded-full flex items-center justify-center text-white group-hover:scale-110 transition-transform flex-shrink-0">
                        <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-6 border-t border-gray-100 bg-white relative z-10">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <span class="text-lg font-bold tracking-tight text-gray-900">Si<span class="text-emerald-600">Magang</span></span>
            </div>
            
            <p class="text-gray-500 font-medium">© 2026 Dinas Sosial. Bangga Melayani Bangsa.</p>
            
            <div class="flex items-center gap-6 text-gray-400">
                <a href="#" class="hover:text-emerald-600 transition-colors">Instagram</a>
                <a href="#" class="hover:text-emerald-600 transition-colors">Twitter</a>
                <a href="#" class="hover:text-emerald-600 transition-colors">LinkedIn</a>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lenis
        const lenis = new Lenis()
        function raf(time) {
            lenis.raf(time)
            requestAnimationFrame(raf)
        }
        requestAnimationFrame(raf)

        // Initialize AOS
        AOS.init({
            duration: 1200,
            once: false,
            easing: 'ease-out-expo',
            mirror: true
        });

        // Mouse Parallax Effect for Blobs
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.01;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.01;
            
            const blobs = document.querySelectorAll('.blob');
            blobs.forEach((blob, index) => {
                const speed = (index + 1) * 0.8;
                blob.style.transform = `translate(${moveX * speed}px, ${moveY * speed}px)`;
            });
        });

        // Custom cursor follower (optional for 4wide feel)
        document.addEventListener('click', (e) => {
            const ripple = document.createElement('div');
            ripple.className = 'fixed w-10 h-10 border-2 border-emerald-500 rounded-full pointer-events-none z-[9999] animate-ping';
            ripple.style.left = `${e.clientX - 20}px`;
            ripple.style.top = `${e.clientY - 20}px`;
            document.body.appendChild(ripple);
            setTimeout(() => ripple.remove(), 1000);
        });
    </script>
</body>
</html>
