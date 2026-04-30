<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(1)->schema([
                    Section::make('Informasi Akun')
                        ->icon('heroicon-o-user-circle')
                        ->schema([
                            TextEntry::make('name')
                                ->weight('bold'),
                            TextEntry::make('email')
                                ->label('Email address')
                                ->copyable(),
                            Grid::make(3)->schema([
                                TextEntry::make('email_verified_at')
                                    ->dateTime()
                                    ->placeholder('-'),
                                TextEntry::make('created_at')
                                    ->dateTime()
                                    ->placeholder('-'),
                                TextEntry::make('updated_at')
                                    ->dateTime()
                                    ->placeholder('-'),
                            ]),
                        ])->columns(2),

                    Section::make('Data Mahasiswa')
                        ->icon('heroicon-o-academic-cap')
                        ->schema([
                            TextEntry::make('mahasiswa.nim')
                                ->label('NIM')
                                ->copyable(),
                            TextEntry::make('mahasiswa.nama')
                                ->label('Nama Lengkap'),
                            TextEntry::make('mahasiswa.universitas.namaUniversitas')
                                ->label('Universitas'),
                            Grid::make(2)->schema([
                                TextEntry::make('mahasiswa.email')
                                    ->label('Email Mahasiswa')
                                    ->icon('heroicon-m-envelope'),
                                TextEntry::make('mahasiswa.noTelepon')
                                    ->label('No. Telepon')
                                    ->icon('heroicon-m-phone'),
                            ]),
                            Grid::make(2)->schema([
                                TextEntry::make('mahasiswa.fakultas')
                                    ->label('Fakultas'),
                                TextEntry::make('mahasiswa.programStudi')
                                    ->label('Program Studi'),
                            ]),
                            Grid::make(2)->schema([
                                TextEntry::make('mahasiswa.kelas')
                                    ->label('Kelas'),
                                TextEntry::make('mahasiswa.semester')
                                    ->label('Semester'),
                            ]),
                        ])
                        ->columns(2)
                        ->visible(fn ($record) => $record && $record->mahasiswa()->exists()),

                    Section::make('Data Pembimbing Universitas')
                        ->icon('heroicon-o-briefcase')
                        ->schema([
                            TextEntry::make('pembimbingUniversitas.nama')
                                ->label('Nama Pembimbing'),
                            TextEntry::make('pembimbingUniversitas.nip')
                                ->label('NIP'),
                            TextEntry::make('pembimbingUniversitas.universitas.namaUniversitas')
                                ->label('Universitas'),
                            TextEntry::make('pembimbingUniversitas.departemen')
                                ->label('Departemen'),
                        ])
                        ->columns(2)
                        ->visible(fn ($record) => $record && $record->pembimbingUniversitas()->exists()),

                    Section::make('Data Pembimbing Perusahaan')
                        ->icon('heroicon-o-building-office')
                        ->schema([
                            TextEntry::make('pembimbingPerusahaan.nama')
                                ->label('Nama Pembimbing'),
                            TextEntry::make('pembimbingPerusahaan.posisi')
                                ->label('Posisi'),
                            TextEntry::make('pembimbingPerusahaan.perusahaan.namaPerusahaan')
                                ->label('Perusahaan'),
                        ])
                        ->columns(2)
                        ->visible(fn ($record) => $record && $record->pembimbingPerusahaan()->exists()),
                ])
            ]);
    }
}
