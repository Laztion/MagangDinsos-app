<div>
<div class="flex min-h-screen">
    <!-- Left Side: Animated Background & Branding -->
    <div class="relative hidden w-0 flex-1 lg:block overflow-hidden bg-emerald-950">
        <!-- Animated Blobs -->
        <div class="absolute inset-0 z-0">
            <div class="blob-1 absolute -top-24 -left-24 h-96 w-96 rounded-full bg-emerald-500/30 blur-[100px] animate-blob"></div>
            <div class="blob-2 absolute top-1/2 -right-24 h-96 w-96 rounded-full bg-emerald-400/20 blur-[100px] animate-blob" style="animation-delay: 2s;"></div>
            <div class="blob-3 absolute -bottom-24 left-1/4 h-96 w-96 rounded-full bg-emerald-600/30 blur-[100px] animate-blob" style="animation-delay: 4s;"></div>
        </div>

        <!-- Noise & Overlay -->
        <div class="absolute inset-0 z-10 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noiseFilter\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.65\' numOctaves=\'3\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noiseFilter)\'/%3E%3C/svg%3E');"></div>
        
        <div class="relative z-20 flex h-full flex-col justify-between p-12 text-white">
            <div class="flex items-center gap-3" data-aos="fade-down">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl">
                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                </div>
                <span class="text-2xl font-black tracking-tighter">Si<span class="text-emerald-400">Magang</span></span>
            </div>

            <div class="space-y-6" data-aos="fade-right" data-aos-delay="200">
                <h1 class="text-5xl font-black leading-tight tracking-tight lg:text-7xl">
                    Selamat Datang <br/> di <span class="text-emerald-400">Portal Karir</span>
                </h1>
                <p class="max-w-md text-xl font-medium text-emerald-100/70">
                    Masuk untuk mengelola perjalanan magang Anda dan akses berbagai fitur profesional kami.
                </p>
            </div>

            <div class="flex items-center gap-4 border-t border-white/10 pt-8" data-aos="fade-up" data-aos-delay="400">
                <div class="flex -space-x-3">
                    <img class="h-10 w-10 rounded-full border-2 border-emerald-900 shadow-sm" src="https://ui-avatars.com/api/?name=User+1&background=047857&color=fff" alt="">
                    <img class="h-10 w-10 rounded-full border-2 border-emerald-900 shadow-sm" src="https://ui-avatars.com/api/?name=User+2&background=059669&color=fff" alt="">
                    <img class="h-10 w-10 rounded-full border-2 border-emerald-900 shadow-sm" src="https://ui-avatars.com/api/?name=User+3&background=10b981&color=fff" alt="">
                </div>
                <p class="text-sm font-semibold text-emerald-100/50">Bergabung dengan 500+ mahasiswa lainnya</p>
            </div>
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-24 bg-white dark:bg-gray-950 relative overflow-hidden">
        <!-- Background decorative for mobile -->
        <div class="lg:hidden absolute inset-0 -z-10 opacity-5">
            <div class="absolute -top-24 -right-24 h-64 w-64 rounded-full bg-emerald-500 blur-[80px]"></div>
        </div>

        <div class="mx-auto w-full max-w-sm" data-aos="fade-up" data-aos-duration="1000">
            <div class="mb-10 lg:hidden">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">Si<span class="text-emerald-600">Magang</span></span>
                </div>
            </div>

            <div class="mb-10">
                <h2 class="text-3xl font-black tracking-tight text-gray-900 dark:text-white">Masuk ke Akun</h2>
                <p class="mt-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                    Belum punya akun? 
                    <a href="{{ route('filament.admin.auth.register') }}" class="font-bold text-emerald-600 hover:text-emerald-500 transition-colors">Daftar sekarang</a>
                </p>
            </div>

            {{ $this->content }}
        </div>
    </div>

    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }
        .animate-blob {
            animation: blob 10s infinite;
        }
        .fi-btn {
            border-radius: 1rem !important;
            padding-top: 0.75rem !important;
            padding-bottom: 0.75rem !important;
            font-weight: 700 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        .fi-btn-color-primary {
            background-color: rgb(5, 150, 105) !important;
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.2) !important;
        }
        .fi-btn-color-primary:hover {
            background-color: rgb(4, 120, 87) !important;
            transform: translateY(-2px) !important;
            box-shadow: 0 20px 25px -5px rgba(16, 185, 129, 0.2) !important;
        }
        .fi-input-wrp {
            border-radius: 0.75rem !important;
            transition: all 0.2s !important;
        }
        .fi-input-wrp:focus-within {
            ring: 2px solid rgb(16, 185, 129) !important;
        }
    </style>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true,
            });
        }
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.02;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.02;
            const blobs = [document.querySelector('.blob-1'), document.querySelector('.blob-2'), document.querySelector('.blob-3')];
            blobs.forEach((blob, index) => {
                if (blob) {
                    const speed = (index + 1) * 0.5;
                    blob.style.transform = `translate(${moveX * speed}px, ${moveY * speed}px)`;
                }
            });
        });
    </script>
</div>
</div>
