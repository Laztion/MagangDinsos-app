<?php

namespace App\Providers\Filament;

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
            ->login()
            ->registration()
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
                            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 40%, #f9fafb 100%);
                            overflow: hidden;
                        }
                        .dark .bg-admin-animated {
                            background: linear-gradient(135deg, #064e3b 0%, #022c22 40%, #064e3b 100%);
                        }
                        .admin-blob {
                            position: absolute;
                            border-radius: 50%;
                            filter: blur(90px);
                            opacity: 0.5;
                            animation: floatAdmin 15s ease-in-out infinite alternate;
                        }
                        .dark .admin-blob {
                            opacity: 0.25;
                        }
                        .admin-blob-1 {
                            width: 700px; height: 700px;
                            background: radial-gradient(circle, #34d399, #10b981);
                            top: -250px; left: -200px;
                            animation-delay: 0s;
                        }
                        .admin-blob-2 {
                            width: 600px; height: 600px;
                            background: radial-gradient(circle, #a7f3d0, #34d399);
                            bottom: -200px; right: -150px;
                            animation-delay: 4s;
                        }
                        @keyframes floatAdmin {
                            0%   { transform: translate(0, 0) scale(1); }
                            50%  { transform: translate(60px, -50px) scale(1.1); }
                            100% { transform: translate(-30px, 40px) scale(0.9); }
                        }

                        /* Transparency & Glassmorphism */
                        .fi-body, .fi-layout, .fi-main {
                            background-color: transparent !important;
                        }
                        
                        .fi-sidebar {
                            background-color: rgba(255, 255, 255, 0.75) !important;
                            backdrop-filter: blur(20px);
                            border-right: 1px solid rgba(0,0,0,0.05) !important;
                            margin: 1rem;
                            height: calc(100vh - 2rem) !important;
                            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.1);
                        }
                        .dark .fi-sidebar {
                            background-color: rgba(6, 78, 59, 0.6) !important;
                            border-right: 1px solid rgba(255,255,255,0.1) !important;
                        }

                        .fi-topbar {
                            background-color: rgba(255, 255, 255, 0.6) !important;
                            backdrop-filter: blur(20px);
                            border-bottom: 1px solid rgba(0,0,0,0.05) !important;
                            margin-bottom: 1rem;
                        }
                        .dark .fi-topbar {
                            background-color: rgba(2, 44, 34, 0.6) !important;
                        }

                        /* Content Refinement */
                        .fi-section, .fi-ta-ctn, .fi-stats-overview-stat {
                            background-color: rgba(255, 255, 255, 0.8) !important;
                            backdrop-filter: blur(10px);
                            border: 1px solid rgba(0,0,0,0.03) !important;
                            box-shadow: 0 4px 20px -5px rgba(0,0,0,0.05) !important;
                            transition: transform 0.2s ease, box-shadow 0.2s ease;
                        }
                        .fi-section:hover, .fi-stats-overview-stat:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.08) !important;
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
                ')
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
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
