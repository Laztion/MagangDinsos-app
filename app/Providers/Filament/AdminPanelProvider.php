<?php

namespace App\Providers\Filament;

use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Auth\Pages\EditProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\Login::class)
            ->registration(\App\Filament\Pages\Auth\Register::class)
            ->emailverification()
            ->colors([
                'primary' => Color::Emerald,
                'gray' => Color::Slate,
                'info' => Color::Cyan,
                'success' => Color::Green,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
            ])
            ->font('Outfit')
            ->brandName('SiMagang')
            ->sidebarCollapsibleOnDesktop()
            ->spa()
            ->profile()
            ->renderHook(
                PanelsRenderHook::BODY_START,
                fn (): string => Blade::render('
                    <style>
                        /* Design Tokens & Global Rounded */
                        :root {
                            --rounded-xl: 20px;
                            --rounded-2xl: 28px;
                        }

                        .fi-main-ctn, .fi-sidebar, .fi-topbar, .fi-section, .fi-card, .fi-modal-window, .fi-dropdown-panel {
                            border-radius: var(--rounded-xl) !important;
                        }

                        /* Animated Background */
                        .bg-admin-animated {
                            position: fixed;
                            inset: 0;
                            z-index: -10;
                            background: radial-gradient(circle at 50% 50%, #f0fdf4 0%, #f9fafb 100%);
                            overflow: hidden;
                        }
                        .dark .bg-admin-animated {
                            background: radial-gradient(circle at 50% 50%, #064e3b 0%, #022c22 100%);
                        }
                        
                        .admin-blob {
                            position: absolute;
                            border-radius: 50%;
                            filter: blur(100px);
                            opacity: 0.4;
                            animation: floatAdmin 20s ease-in-out infinite alternate;
                            transition: transform 0.5s ease-out;
                        }
                        .dark .admin-blob {
                            opacity: 0.2;
                        }
                        .admin-blob-1 {
                            width: 800px; height: 800px;
                            background: radial-gradient(circle, #34d399, #10b981);
                            top: -300px; left: -200px;
                        }
                        .admin-blob-2 {
                            width: 700px; height: 700px;
                            background: radial-gradient(circle, #a7f3d0, #34d399);
                            bottom: -200px; right: -150px;
                            animation-delay: -5s;
                        }
                        @keyframes floatAdmin {
                            0%   { transform: translate(0, 0) rotate(0deg) scale(1); }
                            33%  { transform: translate(100px, -50px) rotate(120deg) scale(1.1); }
                            66%  { transform: translate(-50px, 100px) rotate(240deg) scale(0.9); }
                            100% { transform: translate(0, 0) rotate(360deg) scale(1); }
                        }

                        /* Noise & Glow */
                        .admin-noise {
                            position: fixed;
                            inset: 0;
                            z-index: -5;
                            pointer-events: none;
                            opacity: 0.03;
                            background-image: url("data:image/svg+xml,%3Csvg viewBox=\'0 0 200 200\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cfilter id=\'noiseFilter\'%3E%3CfeTurbulence type=\'fractalNoise\' baseFrequency=\'0.65\' numOctaves=\'3\' stitchTiles=\'stitch\'/%3E%3C/filter%3E%3Crect width=\'100%25\' height=\'100%25\' filter=\'url(%23noiseFilter)\'/%3E%3C/svg%3E");
                        }
                        .admin-viewport-glow {
                            position: fixed;
                            inset: 0;
                            z-index: -4;
                            pointer-events: none;
                            box-shadow: inset 0 0 150px rgba(16, 185, 129, 0.05);
                        }

                        /* Transparency & Glassmorphism */
                        .fi-body, .fi-layout, .fi-main {
                            background-color: transparent !important;
                        }
                        
                        .fi-sidebar {
                            background-color: rgba(255, 255, 255, 0.7) !important;
                            backdrop-filter: blur(20px);
                            border-right: 1px solid rgba(0,0,0,0.05) !important;
                            margin: 1rem;
                            height: calc(100vh - 2rem) !important;
                            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);
                        }
                        .dark .fi-sidebar {
                            background-color: rgba(6, 78, 59, 0.4) !important;
                            border-right: 1px solid rgba(255,255,255,0.05) !important;
                        }

                        .fi-topbar {
                            background-color: rgba(255, 255, 255, 0.5) !important;
                            backdrop-filter: blur(20px);
                            border-bottom: 1px solid rgba(0,0,0,0.05) !important;
                            margin-bottom: 1rem;
                        }
                        .dark .fi-topbar {
                            background-color: rgba(2, 44, 34, 0.4) !important;
                        }

                        /* Content Refinement */
                        .fi-section, .fi-ta-ctn, .fi-stats-overview-stat, .fi-card {
                            background-color: rgba(255, 255, 255, 0.7) !important;
                            backdrop-filter: blur(10px);
                            border: 1px solid rgba(255,255,255,0.5) !important;
                            box-shadow: 0 4px 20px -5px rgba(0,0,0,0.05) !important;
                            transition: all 0.3s ease;
                        }
                        .dark .fi-section, .dark .fi-ta-ctn, .dark .fi-stats-overview-stat, .dark .fi-card {
                            background-color: rgba(6, 78, 59, 0.2) !important;
                            border: 1px solid rgba(255,255,255,0.05) !important;
                        }
                        .fi-section:hover, .fi-stats-overview-stat:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 15px 30px -10px rgba(16, 185, 129, 0.1) !important;
                            border-color: rgba(16, 185, 129, 0.3) !important;
                        }

                        /* Niceer Inputs */
                        input, select, textarea {
                            border-radius: 12px !important;
                        }
                    </style>
                    <div class="bg-admin-animated">
                        <div class="admin-blob admin-blob-1"></div>
                        <div class="admin-blob admin-blob-2"></div>
                    </div>
                    <div class="admin-noise"></div>
                    <div class="admin-viewport-glow"></div>
                ')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->plugins([
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm'      => 2,
                        'lg'      => 3,
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm'      => 2,
                        'lg'      => 4,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm'      => 2,
                    ]),
            ])
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
