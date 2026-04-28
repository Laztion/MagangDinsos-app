<div class="auth-root">
    
    <!-- Immersive Background Animation -->
    <div class="auth-bg-anim">
        <div class="auth-bg-gradient"></div>
        <div class="auth-blob auth-blob-1"></div>
        <div class="auth-blob auth-blob-2"></div>
        <div class="auth-blob auth-blob-3"></div>
    </div>

    <!-- Main Container -->
    <div class="auth-container anim-fade-up">
        
        <!-- Back Button -->
        <div style="margin-bottom: 1rem; padding-left: 0.5rem;">
            <a href="{{ url('/') }}" class="auth-back-btn">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Beranda
            </a>
        </div>

        <div class="auth-card">
            
            <!-- Left Side - Branding & Info -->
            <div class="auth-banner">
                <!-- Abstract Design in Banner -->
                <div class="auth-banner-bg">
                    <div class="auth-banner-circle-1"></div>
                    <div class="auth-banner-circle-2"></div>
                </div>

                <div class="auth-banner-header anim-fade-down">
                    <div class="auth-logo-box">
                        <svg class="auth-logo-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <span class="auth-brand-text">Si<span style="color: #6ee7b7;">Magang</span></span>
                </div>

                <div class="auth-banner-title anim-fade-right delay-100">
                    <h1>
                        Portal Karir & <br/>
                        <span class="auth-brand-gradient">Magang Terpadu</span>
                    </h1>
                    <p>
                        Wujudkan potensi terbaikmu melalui pengalaman magang profesional bersama mitra terpercaya kami.
                    </p>
                </div>

                <!-- Floating Testimonial/Stats Card -->
                <div class="auth-stats-card anim-fade-up delay-200">
                    <div class="auth-stats-flex">
                        <div class="auth-avatars">
                            <img src="https://ui-avatars.com/api/?name=User+1&background=10b981&color=fff" alt="User">
                            <img src="https://ui-avatars.com/api/?name=User+2&background=059669&color=fff" alt="User">
                            <div class="auth-avatar-more">+5k</div>
                        </div>
                        <div class="auth-stats-text">
                            <p class="auth-stats-bold">Dipercaya Mahasiswa</p>
                            <p class="auth-stats-light">Di seluruh Indonesia</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="auth-form-side">
                <!-- Mobile Logo -->
                <div class="auth-mobile-logo anim-fade-down">
                    <div class="auth-logo-box-mobile">
                        <svg class="auth-logo-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <span class="auth-brand-text-mobile">Si<span style="color: #059669;">Magang</span></span>
                </div>

                <div class="auth-form-inner anim-fade-left delay-100">
                    <div class="auth-form-header">
                        <h2>Selamat Datang 👋</h2>
                        <p>
                            Masuk ke akun Anda atau 
                            <a href="{{ route('filament.admin.auth.register') }}">buat akun baru</a>
                        </p>
                    </div>

                    <div class="auth-form-wrapper">
                        {{ $this->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles for Layout and Aesthetics -->
    <style wire:ignore>
        .auth-root { min-height: 100vh; width: 100%; display: flex; align-items: center; justify-content: center; background-color: #f9fafb; position: relative; overflow: hidden; font-family: 'Outfit', sans-serif; }
        .dark .auth-root { background-color: #030712; }
        .auth-bg-anim { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none; overflow: hidden; }
        .auth-bg-gradient { position: absolute; inset: 0; background: radial-gradient(ellipse at top, #d1fae5, #f9fafb); }
        .dark .auth-bg-gradient { background: radial-gradient(ellipse at top, rgba(6, 78, 59, 0.2), #030712); }
        
        .auth-blob { position: absolute; border-radius: 50%; mix-blend-mode: multiply; filter: blur(100px); animation: blob 7s infinite; }
        .dark .auth-blob { mix-blend-mode: screen; }
        .auth-blob-1 { top: -10%; left: -10%; width: 40%; height: 40%; background-color: rgba(52, 211, 153, 0.2); }
        .auth-blob-2 { top: 20%; right: -10%; width: 50%; height: 50%; background-color: rgba(45, 212, 191, 0.2); animation-delay: 2s; }
        .auth-blob-3 { bottom: -20%; left: 20%; width: 60%; height: 60%; background-color: rgba(110, 231, 183, 0.2); animation-delay: 4s; }

        .auth-container { position: relative; z-index: 10; width: 100%; max-width: 1024px; margin: 2rem auto; padding: 1rem; }
        .auth-card { width: 100%; display: flex; flex-direction: column; background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(24px); border-radius: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border: 1px solid rgba(255, 255, 255, 0.4); overflow: hidden; }
        .dark .auth-card { background-color: rgba(17, 24, 39, 0.8); border-color: rgba(31, 41, 55, 0.5); }

        .auth-banner { display: none; position: relative; width: 41.666667%; padding: 3rem; flex-direction: column; justify-content: space-between; background-color: #059669; color: white; overflow: hidden; }
        .dark .auth-banner { background-color: #064e3b; }
        @media (min-width: 1024px) { .auth-card { flex-direction: row; } .auth-banner { display: flex; } }

        .auth-banner-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden; }
        .auth-banner-circle-1 { position: absolute; top: 2.5rem; right: 2.5rem; width: 8rem; height: 8rem; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; filter: blur(20px); }
        .auth-banner-circle-2 { position: absolute; bottom: 2.5rem; left: 2.5rem; width: 12rem; height: 12rem; background-color: rgba(52, 211, 153, 0.2); border-radius: 50%; filter: blur(30px); }

        .auth-banner-header { position: relative; z-index: 10; display: flex; align-items: center; gap: 0.75rem; }
        .auth-logo-box { padding: 0.625rem; background-color: rgba(255, 255, 255, 0.2); border-radius: 0.75rem; backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .auth-logo-svg { width: 1.75rem; height: 1.75rem; color: white; }
        .auth-brand-text { font-size: 1.5rem; font-weight: 900; letter-spacing: -0.025em; }

        .auth-banner-title { position: relative; z-index: 10; margin-top: 3rem; margin-bottom: auto; }
        .auth-banner-title h1 { font-size: 2.25rem; font-weight: 900; line-height: 1.2; margin-bottom: 1.5rem; }
        @media (min-width: 1024px) { .auth-banner-title h1 { font-size: 3rem; } }
        .auth-brand-gradient { color: transparent; background-clip: text; -webkit-background-clip: text; background-image: linear-gradient(to right, #d1fae5, #ffffff); }
        .auth-banner-title p { color: #ecfdf5; font-size: 1.125rem; line-height: 1.625; max-width: 24rem; opacity: 0.9; }

        .auth-stats-card { position: relative; z-index: 10; margin-top: 3rem; background-color: rgba(255, 255, 255, 0.1); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.2); padding: 1.25rem; border-radius: 1rem; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; }
        .auth-stats-card:hover { transform: translateY(-4px); background-color: rgba(255, 255, 255, 0.15); }
        .auth-stats-flex { display: flex; align-items: center; gap: 1rem; }
        .auth-avatars { display: flex; }
        .auth-avatars img, .auth-avatar-more { width: 2.5rem; height: 2.5rem; border-radius: 50%; border: 2px solid #059669; margin-left: -0.75rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); }
        .auth-avatars img:first-child { margin-left: 0; }
        .auth-avatar-more { background-color: #065f46; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700; color: white; }
        .auth-stats-text { font-size: 0.875rem; }
        .auth-stats-bold { font-weight: 700; color: white; margin: 0; }
        .auth-stats-light { color: #a7f3d0; margin: 0; }

        .auth-form-side { width: 100%; padding: 2rem; display: flex; flex-direction: column; justify-content: center; position: relative; background-color: rgba(255, 255, 255, 0.5); }
        .dark .auth-form-side { background-color: rgba(17, 24, 39, 0.5); }
        @media (min-width: 640px) { .auth-form-side { padding: 3rem; } }
        @media (min-width: 1024px) { .auth-form-side { width: 58.333333%; padding: 4rem; } }

        .auth-mobile-logo { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; }
        @media (min-width: 1024px) { .auth-mobile-logo { display: none; } }
        .auth-logo-box-mobile { padding: 0.625rem; background-color: #10b981; border-radius: 0.75rem; box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3); }
        .auth-brand-text-mobile { font-size: 1.5rem; font-weight: 900; letter-spacing: -0.025em; color: #111827; }
        .dark .auth-brand-text-mobile { color: white; }

        .auth-form-inner { max-width: 28rem; width: 100%; margin: 0 auto; }
        .auth-form-header { margin-bottom: 2.5rem; text-align: center; }
        @media (min-width: 1024px) { .auth-form-header { text-align: left; } }
        .auth-form-header h2 { font-size: 1.875rem; font-weight: 900; color: #111827; letter-spacing: -0.025em; margin-bottom: 0.75rem; }
        .dark .auth-form-header h2 { color: white; }
        @media (min-width: 640px) { .auth-form-header h2 { font-size: 2.25rem; } }
        .auth-form-header p { color: #6b7280; font-weight: 500; font-size: 0.875rem; margin: 0; }
        .dark .auth-form-header p { color: #9ca3af; }
        .auth-form-header a { color: #059669; font-weight: 700; text-decoration: none; transition: color 0.3s; }
        .dark .auth-form-header a { color: #34d399; }
        .auth-form-header a:hover { text-decoration: underline; color: #047857; }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeRight { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeLeft { from { opacity: 0; transform: translateX(30px); } to { opacity: 1; transform: translateX(0); } }

        .anim-fade-up { opacity: 0; animation: fadeUp 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .anim-fade-down { opacity: 0; animation: fadeDown 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .anim-fade-right { opacity: 0; animation: fadeRight 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .anim-fade-left { opacity: 0; animation: fadeLeft 1s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }

        /* Filament Form Overrides for better aesthetics */
        .auth-form-wrapper .fi-btn { border-radius: 1rem !important; padding: 0.75rem 1.5rem !important; font-weight: 700 !important; transition: all 0.3s ease !important; }
        .auth-form-wrapper .fi-btn-color-primary { background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important; border: none !important; box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3) !important; color: white !important; }
        .auth-form-wrapper .fi-btn-color-primary:hover { transform: translateY(-2px) !important; box-shadow: 0 15px 20px -3px rgba(16, 185, 129, 0.4) !important; background: linear-gradient(135deg, #059669 0%, #047857 100%) !important; }
        .auth-form-wrapper .fi-input-wrp { border-radius: 0.75rem !important; background: rgba(255, 255, 255, 0.6) !important; backdrop-filter: blur(10px) !important; border: 1px solid rgba(209, 213, 219, 0.5) !important; transition: all 0.3s ease !important; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important; }
        .dark .auth-form-wrapper .fi-input-wrp { background: rgba(17, 24, 39, 0.6) !important; border-color: rgba(55, 65, 81, 0.5) !important; }
        .auth-form-wrapper .fi-input-wrp:focus-within { border-color: #10b981 !important; box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important; background: rgba(255, 255, 255, 1) !important; }
        .dark .auth-form-wrapper .fi-input-wrp:focus-within { background: rgba(17, 24, 39, 1) !important; }

        .auth-back-btn { display: inline-flex; align-items: center; gap: 0.5rem; color: #4b5563; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: color 0.3s ease; }
        .dark .auth-back-btn { color: #9ca3af; }
        .auth-back-btn:hover { color: #059669; }
        .dark .auth-back-btn:hover { color: #34d399; }
        .auth-back-btn svg { width: 1.25rem; height: 1.25rem; transition: transform 0.3s ease; }
        .auth-back-btn:hover svg { transform: translateX(-4px); }
    </style>
</div>
