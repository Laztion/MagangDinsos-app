<div>

<div class="flex min-h-screen">

    <!-- Left Side: Registration Form -->
    <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-24 bg-white dark:bg-gray-950 relative overflow-hidden">
 
        <!-- Background decorative -->
        <div class="absolute inset-0 -z-10 opacity-5">
            <div class="absolute -bottom-24 -left-24 h-96 w-96 rounded-full bg-emerald-500 blur-[100px] animate-pulse"></div>
        </div>

        <div class="mx-auto w-full max-w-md" data-aos="fade-right" data-aos-duration="1000">
            <div class="mb-10">
                <div class="flex items-center gap-2 mb-8">
                    <div class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-gray-900 dark:text-white uppercase">Mulai <span class="text-emerald-600">Perjalanan</span></span>
                </div>

                <h2 class="text-4xl font-black tracking-tighter text-gray-900 dark:text-white uppercase leading-none">Buat Akun Baru.</h2>
                <p class="mt-4 text-lg font-medium text-gray-500 dark:text-gray-400">
                    Sudah memiliki akun? 
                    <a href="{{ route('filament.admin.auth.login') }}" class="font-bold text-emerald-600 hover:text-emerald-500 transition-colors">Masuk di sini</a>
                </p>
            </div>

            {{ $this->content }}
        </div>
    </div>

    <!-- Right Side: Decorative & Info -->
    <div class="relative hidden w-0 flex-1 lg:block overflow-hidden bg-gray-900">
        
        <!-- Animated Elements -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-0 right-0 h-full w-full opacity-20" style="background-image: radial-gradient(#10b981 1px, transparent 1px); background-size: 30px 30px;"></div>
            <div class="blob-1 absolute bottom-0 right-0 h-[500px] w-[500px] rounded-full bg-emerald-600/20 blur-[120px] animate-blob"></div>
            <div class="blob-2 absolute top-1/4 left-0 h-96 w-96 rounded-full bg-emerald-500/10 blur-[100px] animate-blob" style="animation-delay: 3s;"></div>
        </div>

        <div class="relative z-20 flex h-full flex-col justify-center p-20 text-white">
            <div class="space-y-12" data-aos="fade-left">
                
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-sm font-bold tracking-widest uppercase">
                    Program Magang 2026
                </div>
                
                <h3 class="text-6xl font-black leading-[0.9] tracking-tighter uppercase">
                    Build Your <br/>
                    <span class="text-emerald-500">Future</span> <br/>
                    With Us.
                </h3>

                <div class="grid grid-cols-2 gap-8 pt-10 border-t border-white/5">
                    <div class="space-y-2">
                        <p class="text-4xl font-black text-emerald-500">100%</p>
                        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Digital Process</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-4xl font-black text-emerald-500">Quick</p>
                        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Verification</p>
                    </div>
                </div>

                <div class="flex items-center gap-6 p-8 rounded-3xl bg-white/5 backdrop-blur-md border border-white/10">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-emerald-600 shadow-lg shadow-emerald-900/50">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <div>
                        <p class="text-lg font-bold">Akses Instan</p>
                        <p class="text-sm text-gray-400">Dapatkan akses ke dashboard segera setelah pendaftaran.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(-30px, 50px) scale(1.1); }
            66% { transform: translate(20px, -20px) scale(0.9); }
        }
        .animate-blob {
            animation: blob 12s infinite linear;
        }
        .fi-btn {
            border-radius: 1rem !important;
            padding-top: 0.875rem !important;
            padding-bottom: 0.875rem !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }
        .fi-btn-color-primary {
            background-color: rgb(5, 150, 105) !important;
        }
        .fi-btn-color-primary:hover {
            background-color: rgb(4, 120, 87) !important;
            transform: scale(1.02) !important;
        }
        .fi-input-wrp {
            border-radius: 0.875rem !important;
        }
    </style>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-out-back'
            });
        }
        document.addEventListener('mousemove', (e) => {
            const moveX = (e.clientX - window.innerWidth / 2) * 0.02;
            const moveY = (e.clientY - window.innerHeight / 2) * 0.02;
            const blobs = [document.querySelector('.blob-1'), document.querySelector('.blob-2')];
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

