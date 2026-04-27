<?php

namespace App\Filament\Resources\Mahasiswas\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MahasiswaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Grid::make(1)
                            ->schema([
                                Section::make('Data Pribadi')
                                    ->icon('heroicon-o-user')
                                    ->schema([
                                        TextEntry::make('nama')
                                            ->weight('bold')
                                            ->size('lg'),
                                        TextEntry::make('nim')
                                            ->label('NIM')
                                            ->copyable(),
                                        Grid::make(2)->schema([
                                            TextEntry::make('jenisKelamin')
                                                ->badge(),
                                            TextEntry::make('tanggalLahir')
                                                ->date(),
                                        ]),
                                        TextEntry::make('tempatLahir'),
                                    ])->columns(1),

                                Section::make('Akademik')
                                    ->icon('heroicon-o-academic-cap')
                                    ->schema([
                                        TextEntry::make('universitas.namaUniversitas')
                                            ->label('Universitas')
                                            ->color('primary')
                                            ->weight('medium'),
                                        Grid::make(2)->schema([
                                            TextEntry::make('fakultas'),
                                            TextEntry::make('programStudi'),
                                        ]),
                                        Grid::make(2)->schema([
                                            TextEntry::make('kelas'),
                                            TextEntry::make('semester'),
                                        ]),
                                        TextEntry::make('tanggalDaftar')
                                            ->label('Tanggal Daftar Magang')
                                            ->dateTime(),
                                    ]),

                                Section::make('Kontak & Alamat')
                                    ->icon('heroicon-o-map-pin')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextEntry::make('email')
                                                ->icon('heroicon-m-envelope')
                                                ->copyable(),
                                            TextEntry::make('noTelepon')
                                                ->icon('heroicon-m-phone'),
                                        ]),
                                        TextEntry::make('alamat')
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columnSpan(2),

                        Grid::make(1)
                            ->schema([
                                Section::make('Profil')
                                    ->schema([
                                        ImageEntry::make('foto')
                                            ->circular()
                                            ->size(150)
                                            ->extraAttributes(['class' => 'mx-auto']),
                                        
                                        IconEntry::make('statusKeaktifan')
                                            ->label('Status Aktif')
                                            ->boolean()
                                            ->alignCenter(),
                                    ]),

                                Section::make('Informasi Sistem')
                                    ->schema([
                                        TextEntry::make('user.name')
                                            ->label('Akun User'),
                                        TextEntry::make('created_at')
                                            ->label('Terdaftar Pada')
                                            ->dateTime(),
                                        TextEntry::make('updated_at')
                                            ->label('Update Terakhir')
                                            ->dateTime(),
                                    ]),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
