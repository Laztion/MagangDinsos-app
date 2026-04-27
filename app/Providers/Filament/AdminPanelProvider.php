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
                'primary' => Color::Blue,
                'gray' => Color::Slate,
                'info' => Color::Cyan,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'danger' => Color::Rose,
            ])
            ->font('Inter')
            ->brandName('SiMagang')
            ->sidebarCollapsibleOnDesktop()
            ->spa()
            ->profile()
            ->renderHook(
                PanelsRenderHook::BODY_START,
                fn (): string => Blade::render('
                    <style>
                        .bg-admin-animated {
                            position: fixed;
                            inset: 0;
                            z-index: -10;
                            background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 40%, #f1f5f9 100%);
                            overflow: hidden;
                        }
                        .dark .bg-admin-animated {
                            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #0f172a 100%);
                        }
                        .admin-blob {
                            position: absolute;
                            border-radius: 50%;
                            filter: blur(80px);
                            opacity: 0.6;
                            animation: floatAdmin 12s ease-in-out infinite alternate;
                        }
                        .dark .admin-blob {
                            opacity: 0.35;
                        }
                        .admin-blob-1 {
                            width: 600px; height: 600px;
                            background: radial-gradient(circle, #93c5fd, #3b82f6);
                            top: -200px; left: -150px;
                            animation-delay: 0s;
                        }
                        .dark .admin-blob-1 {
                            background: radial-gradient(circle, #3b82f6, #1d4ed8);
                        }
                        .admin-blob-2 {
                            width: 500px; height: 500px;
                            background: radial-gradient(circle, #c4b5fd, #8b5cf6);
                            bottom: -150px; right: -100px;
                            animation-delay: 3s;
                        }
                        .dark .admin-blob-2 {
                            background: radial-gradient(circle, #8b5cf6, #6d28d9);
                        }
                        @keyframes floatAdmin {
                            0%   { transform: translate(0, 0) scale(1); }
                            50%  { transform: translate(40px, -40px) scale(1.05); }
                            100% { transform: translate(-20px, 30px) scale(0.97); }
                        }
                        /* Make filament layout transparent to show the animated background */
                        .fi-body, .fi-layout, .fi-main {
                            background-color: transparent !important;
                        }
                        /* Optional: add slight transparency to the sidebar/topbar for glass effect */
                        .fi-sidebar {
                            background-color: rgba(255, 255, 255, 0.8) !important;
                            backdrop-filter: blur(16px);
                        }
                        .dark .fi-sidebar {
                            background-color: rgba(15, 23, 42, 0.8) !important;
                        }
                        .fi-topbar {
                            background-color: rgba(255, 255, 255, 0.7) !important;
                            backdrop-filter: blur(16px);
                        }
                        .dark .fi-topbar {
                            background-color: rgba(15, 23, 42, 0.7) !important;
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
