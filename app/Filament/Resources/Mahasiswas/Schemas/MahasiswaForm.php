<?php

namespace App\Filament\Resources\Mahasiswas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MahasiswaForm
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
                                    ->description('Informasi dasar mahasiswa')
                                    ->icon('heroicon-o-user')
                                    ->schema([
                                        TextInput::make('nama')
                                            ->required()
                                            ->placeholder('Nama Lengkap'),
                                        TextInput::make('nim')
                                            ->label('NIM')
                                            ->required()
                                            ->unique(ignoreRecord: true),
                                        Grid::make(2)->schema([
                                            Select::make('jenisKelamin')
                                                ->options(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'])
                                                ->required(),
                                            DatePicker::make('tanggalLahir')
                                                ->required(),
                                        ]),
                                        TextInput::make('tempatLahir')
                                            ->required(),
                                    ])->columns(1),

                                Section::make('Akademik')
                                    ->description('Informasi universitas dan program studi')
                                    ->icon('heroicon-o-academic-cap')
                                    ->schema([
                                        Select::make('universitas_id')
                                            ->required()
                                            ->label('Universitas')
                                            ->relationship('universitas', 'namaUniversitas')
                                            ->searchable()
                                            ->preload(),
                                        Grid::make(2)->schema([
                                            TextInput::make('fakultas'),
                                            TextInput::make('programStudi'),
                                        ]),
                                        Grid::make(2)->schema([
                                            TextInput::make('kelas')
                                                ->required(),
                                            TextInput::make('semester')
                                                ->numeric()
                                                ->required(),
                                        ]),
                                        DateTimePicker::make('tanggalDaftar')
                                            ->label('Tanggal Daftar Magang')
                                            ->required(),
                                    ]),

                                Section::make('Kontak & Alamat')
                                    ->icon('heroicon-o-map-pin')
                                    ->schema([
                                        Grid::make(2)->schema([
                                            TextInput::make('email')
                                                ->email()
                                                ->required(),
                                            TextInput::make('noTelepon')
                                                ->tel(),
                                        ]),
                                        Textarea::make('alamat')
                                            ->rows(3)
                                            ->columnSpanFull(),
                                    ]),
                            ])
                            ->columnSpan(2),

                        Grid::make(1)
                            ->schema([
                                Section::make('Status & Foto')
                                    ->schema([
                                        FileUpload::make('foto')
                                            ->image()
                                            ->avatar()
                                            ->imageEditor()
                                            ->extraAttributes(['class' => 'mx-auto']),
                                        
                                        Toggle::make('statusKeaktifan')
                                            ->label('Mahasiswa Aktif')
                                            ->required()
                                            ->onColor('success')
                                            ->offColor('danger'),
                                    ]),

                                Section::make('Akun Sistem')
                                    ->description('Kaitan dengan user login')
                                    ->schema([
                                        Select::make('user_id')
                                            ->label('User Account')
                                            ->relationship('user', 'name')
                                            ->required()
                                            ->searchable()
                                            ->preload(),
                                    ]),
                            ])
                            ->columnSpan(1),
                    ]),
            ]);
    }
}
