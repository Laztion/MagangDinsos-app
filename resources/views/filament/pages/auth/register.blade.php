<div class="auth-root">
    
    <!-- Immersive Background Animation -->
    <div class="auth-bg-anim">
        <div class="auth-bg-gradient-teal"></div>
        <div class="auth-blob auth-blob-1"></div>
        <div class="auth-blob auth-blob-2"></div>
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

        <div class="auth-card auth-card-reverse">
            
            <!-- Left Side - Form -->
            <div class="auth-form-side">
                <!-- Mobile Logo -->
                <div class="auth-mobile-logo anim-fade-down">
                    <div class="auth-logo-box-mobile" style="background-color: #14b8a6; box-shadow: 0 10px 15px -3px rgba(20, 184, 166, 0.3);">
                        <svg class="auth-logo-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </div>
                    <span class="auth-brand-text-mobile">Si<span style="color: #0d9488;">Magang</span></span>
                </div>

                <div class="auth-form-inner anim-fade-right delay-100">
                    <div class="auth-form-header">
                        <div class="auth-badge">Pendaftaran Akun</div>
                        <h2>Mulai Perjalananmu</h2>
                        <p>
                            Sudah memiliki akun? 
                            <a href="{{ route('filament.admin.auth.login') }}" style="color: #0d9488;">Masuk di sini</a>
                        </p>
                    </div>

                    <div class="auth-form-wrapper">
                        {{ $this->content }}
                    </div>
                </div>
            </div>

            <!-- Right Side - Branding & Info -->
            <div class="auth-banner auth-banner-teal">
                <!-- Abstract Design in Banner -->
                <div class="auth-banner-bg">
                    <div class="auth-banner-bg-teal"></div>
                    <div class="auth-banner-circle-1" style="background-color: rgba(52, 211, 153, 0.3); top: 25%; right: 2.5rem; width: 12rem; height: 12rem;"></div>
                    <div class="auth-banner-circle-2" style="background-color: rgba(45, 212, 191, 0.2); bottom: 25%; left: 2.5rem; width: 16rem; height: 16rem;"></div>
                </div>

                <div class="auth-banner-header" style="justify-content: flex-end;" class="anim-fade-down">
                    <span class="auth-brand-text">Si<span style="color: #99f6e4;">Magang</span></span>
                    <div class="auth-logo-box">
                        <svg class="auth-logo-svg" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                    </div>
                </div>

                <div class="auth-banner-title anim-fade-left delay-100" style="margin-top: auto; margin-bottom: auto;">
                    <h1>
                        Bangun <br/>
                        Masa Depan <br/>
                        <span class="auth-brand-gradient-teal">Karirmu.</span>
                    </h1>
                    
                    <div style="display: flex; flex-direction: column; gap: 1.25rem; margin-top: 2.5rem;">
                        <div class="auth-feature-row">
                            <div class="auth-feature-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="auth-stats-bold">100% Digital</p>
                                <p class="auth-stats-light">Proses pendaftaran instan</p>
                            </div>
                        </div>
                        <div class="auth-feature-row">
                            <div class="auth-feature-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <div>
                                <p class="auth-stats-bold">Akses Cepat</p>
                                <p class="auth-stats-light">Langsung akses dashboard</p>
                            </div>
                        </div>
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
        .auth-bg-gradient-teal { position: absolute; inset: 0; background: radial-gradient(ellipse at bottom, #ccfbf1, #f9fafb); }
        .dark .auth-bg-gradient-teal { background: radial-gradient(ellipse at bottom, rgba(13, 148, 136, 0.2), #030712); }
        
        .auth-blob { position: absolute; border-radius: 50%; mix-blend-mode: multiply; filter: blur(100px); animation: blob 7s infinite; }
        .dark .auth-blob { mix-blend-mode: screen; }
        .auth-blob-1 { top: 10%; right: 10%; width: 40%; height: 40%; background-color: rgba(52, 211, 153, 0.2); }
        .auth-blob-2 { bottom: 20%; left: 10%; width: 50%; height: 50%; background-color: rgba(45, 212, 191, 0.2); animation-delay: 2s; }

        .auth-container { position: relative; z-index: 10; width: 100%; max-width: 1024px; margin: 2rem auto; padding: 1rem; }
        .auth-card { width: 100%; display: flex; flex-direction: column; background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(24px); border-radius: 2.5rem; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); border: 1px solid rgba(255, 255, 255, 0.4); overflow: hidden; }
        .dark .auth-card { background-color: rgba(17, 24, 39, 0.8); border-color: rgba(31, 41, 55, 0.5); }
        @media (min-width: 1024px) { .auth-card-reverse { flex-direction: row-reverse; } }

        .auth-banner { display: none; position: relative; width: 41.666667%; padding: 3rem; flex-direction: column; justify-content: space-between; color: white; overflow: hidden; }
        .auth-banner-teal { background-color: #0f766e; }
        .dark .auth-banner-teal { background-color: #134e4a; }
        @media (min-width: 1024px) { .auth-banner { display: flex; } }

        .auth-banner-bg { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; overflow: hidden; }
        .auth-banner-bg-teal { position: absolute; inset: 0; background: linear-gradient(to bottom right, #0d9488, #065f46); opacity: 0.9; }
        .dark .auth-banner-bg-teal { background: linear-gradient(to bottom right, #115e59, #022c22); }
        .auth-banner-circle-1 { position: absolute; border-radius: 50%; filter: blur(30px); }
        .auth-banner-circle-2 { position: absolute; border-radius: 50%; filter: blur(30px); }

        .auth-banner-header { position: relative; z-index: 10; display: flex; align-items: center; gap: 0.75rem; }
        .auth-logo-box { padding: 0.625rem; background-color: rgba(255, 255, 255, 0.2); border-radius: 0.75rem; backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.3); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .auth-logo-svg { width: 1.75rem; height: 1.75rem; color: white; }
        .auth-brand-text { font-size: 1.5rem; font-weight: 900; letter-spacing: -0.025em; }

        .auth-banner-title { position: relative; z-index: 10; margin-top: 3rem; margin-bottom: auto; }
        .auth-banner-title h1 { font-size: 2.25rem; font-weight: 900; line-height: 1.2; margin-bottom: 1.5rem; }
        @media (min-width: 1024px) { .auth-banner-title h1 { font-size: 3rem; } }
        .auth-brand-gradient-teal { color: transparent; background-clip: text; -webkit-background-clip: text; background-image: linear-gradient(to right, #99f6e4, #ffffff); }
        
        .auth-feature-row { display: flex; align-items: center; gap: 1rem; background-color: rgba(255, 255, 255, 0.1); backdrop-filter: blur(4px); padding: 1rem; border-radius: 1rem; border: 1px solid rgba(255, 255, 255, 0.1); transition: background-color 0.3s; }
        .auth-feature-row:hover { background-color: rgba(255, 255, 255, 0.2); }
        .auth-feature-icon { width: 2.5rem; height: 2.5rem; border-radius: 50%; background-color: rgba(16, 185, 129, 0.2); display: flex; align-items: center; justify-content: center; color: #6ee7b7; }
        .auth-feature-icon svg { width: 1.25rem; height: 1.25rem; }
        
        .auth-stats-bold { font-weight: 700; color: white; margin: 0; font-size: 0.875rem; }
        .auth-stats-light { color: #ccfbf1; margin: 0; font-size: 0.875rem; }

        .auth-form-side { width: 100%; padding: 2rem; display: flex; flex-direction: column; justify-content: center; position: relative; background-color: rgba(255, 255, 255, 0.5); }
        .dark .auth-form-side { background-color: rgba(17, 24, 39, 0.5); }
        @media (min-width: 640px) { .auth-form-side { padding: 3rem; } }
        @media (min-width: 1024px) { .auth-form-side { width: 58.333333%; padding: 4rem; } }

        .auth-mobile-logo { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 2rem; }
        @media (min-width: 1024px) { .auth-mobile-logo { display: none; } }
        .auth-logo-box-mobile { padding: 0.625rem; border-radius: 0.75rem; }
        .auth-brand-text-mobile { font-size: 1.5rem; font-weight: 900; letter-spacing: -0.025em; color: #111827; }
        .dark .auth-brand-text-mobile { color: white; }

        .auth-form-inner { max-width: 28rem; width: 100%; margin: 0 auto; }
        .auth-form-header { margin-bottom: 2.5rem; text-align: center; }
        @media (min-width: 1024px) { .auth-form-header { text-align: left; } }
        .auth-badge { display: inline-block; padding: 0.25rem 0.75rem; margin-bottom: 1rem; border-radius: 9999px; background-color: #ccfbf1; color: #0d9488; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; border: 1px solid #99f6e4; }
        .dark .auth-badge { background-color: rgba(13, 148, 136, 0.2); color: #2dd4bf; border-color: rgba(20, 184, 166, 0.5); }
        .auth-form-header h2 { font-size: 1.875rem; font-weight: 900; color: #111827; letter-spacing: -0.025em; margin-bottom: 0.75rem; }
        .dark .auth-form-header h2 { color: white; }
        @media (min-width: 640px) { .auth-form-header h2 { font-size: 2.25rem; } }
        .auth-form-header p { color: #6b7280; font-weight: 500; font-size: 0.875rem; margin: 0; }
        .dark .auth-form-header p { color: #9ca3af; }
        .auth-form-header a { font-weight: 700; text-decoration: none; transition: color 0.3s; }
        .auth-form-header a:hover { text-decoration: underline; color: #0f766e; }

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
        .auth-form-wrapper .fi-btn-color-primary { background: linear-gradient(135deg, #14b8a6 0%, #0d9488 100%) !important; border: none !important; box-shadow: 0 10px 15px -3px rgba(20, 184, 166, 0.3) !important; color: white !important; }
        .auth-form-wrapper .fi-btn-color-primary:hover { transform: translateY(-2px) !important; box-shadow: 0 15px 20px -3px rgba(20, 184, 166, 0.4) !important; background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%) !important; }
        .auth-form-wrapper .fi-input-wrp { border-radius: 0.75rem !important; background: rgba(255, 255, 255, 0.6) !important; backdrop-filter: blur(10px) !important; border: 1px solid rgba(209, 213, 219, 0.5) !important; transition: all 0.3s ease !important; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important; }
        .dark .auth-form-wrapper .fi-input-wrp { background: rgba(17, 24, 39, 0.6) !important; border-color: rgba(55, 65, 81, 0.5) !important; }
        .auth-form-wrapper .fi-input-wrp:focus-within { border-color: #14b8a6 !important; box-shadow: 0 0 0 4px rgba(20, 184, 166, 0.1) !important; background: rgba(255, 255, 255, 1) !important; }
        .dark .auth-form-wrapper .fi-input-wrp:focus-within { background: rgba(17, 24, 39, 1) !important; }

        .auth-back-btn { display: inline-flex; align-items: center; gap: 0.5rem; color: #4b5563; font-weight: 600; font-size: 0.875rem; text-decoration: none; transition: color 0.3s ease; }
        .dark .auth-back-btn { color: #9ca3af; }
        .auth-back-btn:hover { color: #0d9488; }
        .dark .auth-back-btn:hover { color: #2dd4bf; }
        .auth-back-btn svg { width: 1.25rem; height: 1.25rem; transition: transform 0.3s ease; }
        .auth-back-btn:hover svg { transform: translateX(-4px); }
    </style>
</div>
