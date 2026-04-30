<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Grid::make(1)->schema([
                    Section::make('Informasi Akun')
                        ->icon('heroicon-o-user-circle')
                        ->schema([
                            TextInput::make('name')
                                ->required(),

                            TextInput::make('email')
                                ->label('Email address')
                                ->email()
                                ->required(),
                            
                            Grid::make(2)->schema([
                                DateTimePicker::make('email_verified_at'),
                                TextInput::make('password')
                                    ->password()
                                    ->dehydrated(fn ($state) => filled($state))
                                    ->required(fn ($record) => $record === null),
                            ]),

                            Select::make('roles')
                                ->relationship('roles', 'name')
                                ->multiple()
                                ->preload()
                                ->searchable(),

                            Toggle::make('is_active')
                                ->label('Active')
                                ->default(true),
                        ])->columns(2),

                    Section::make('Data Mahasiswa')
                        ->icon('heroicon-o-academic-cap')
                        ->schema([
                            TextInput::make('mahasiswa.nim')
                                ->label('NIM')
                                ->disabled(),
                            TextInput::make('mahasiswa.nama')
                                ->label('Nama Lengkap')
                                ->disabled(),
                            Grid::make(2)->schema([
                                TextInput::make('mahasiswa.email')
                                    ->label('Email Mahasiswa')
                                    ->disabled(),
                                TextInput::make('mahasiswa.noTelepon')
                                    ->label('No. Telepon')
                                    ->disabled(),
                            ]),
                            TextInput::make('mahasiswa.universitas.namaUniversitas')
                                ->label('Universitas')
                                ->disabled(),
                            Grid::make(2)->schema([
                                TextInput::make('mahasiswa.fakultas')
                                    ->label('Fakultas')
                                    ->disabled(),
                                TextInput::make('mahasiswa.programStudi')
                                    ->label('Program Studi')
                                    ->disabled(),
                            ]),
                        ])
                        ->columns(2)
                        ->collapsed()
                        ->visible(fn ($record) => $record && $record->mahasiswa()->exists()),

                    Section::make('Data Pembimbing Universitas')
                        ->icon('heroicon-o-briefcase')
                        ->schema([
                            TextInput::make('pembimbingUniversitas.nama')
                                ->label('Nama Pembimbing')
                                ->disabled(),
                            TextInput::make('pembimbingUniversitas.nip')
                                ->label('NIP')
                                ->disabled(),
                            TextInput::make('pembimbingUniversitas.universitas.namaUniversitas')
                                ->label('Universitas')
                                ->disabled(),
                            TextInput::make('pembimbingUniversitas.departemen')
                                ->label('Departemen')
                                ->disabled(),
                        ])
                        ->columns(2)
                        ->collapsed()
                        ->visible(fn ($record) => $record && $record->pembimbingUniversitas()->exists()),

                    Section::make('Data Pembimbing Perusahaan')
                        ->icon('heroicon-o-building-office')
                        ->schema([
                            TextInput::make('pembimbingPerusahaan.nama')
                                ->label('Nama Pembimbing')
                                ->disabled(),
                            TextInput::make('pembimbingPerusahaan.posisi')
                                ->label('Posisi')
                                ->disabled(),
                            TextInput::make('pembimbingPerusahaan.perusahaan.namaPerusahaan')
                                ->label('Perusahaan')
                                ->disabled(),
                        ])
                        ->columns(2)
                        ->collapsed()
                        ->visible(fn ($record) => $record && $record->pembimbingPerusahaan()->exists()),
                ]),
            ]);
    }
}
