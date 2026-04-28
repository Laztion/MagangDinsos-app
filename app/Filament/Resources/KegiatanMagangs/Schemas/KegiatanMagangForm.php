<?php

namespace App\Filament\Resources\KegiatanMagangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class KegiatanMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Placeholder::make('mahasiswa_name')
                    ->label('Mahasiswa')
                    ->content(fn() => auth()->user()->mahasiswa?->nama)
                    ->visible(fn() => auth()->user()->mahasiswa !== null),
                \Filament\Forms\Components\Hidden::make('mahasiswa_id')
                    ->default(fn() => auth()->user()->mahasiswa?->id)
                    ->visible(fn() => auth()->user()->mahasiswa !== null)
                    ->dehydrated(true)
                    ->required(),
                Select::make('mahasiswa_id')
                    ->label('Pilih Mahasiswa')
                    ->relationship('mahasiswa', 'nama')
                    ->visible(fn() => auth()->user()->mahasiswa === null)
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('perusahaan_id')
                    ->relationship('perusahaan', 'namaPerusahaan')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('pembimbing_universitas_id')
                    ->relationship('pembimbingUniversitas', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('pembimbing_perusahaan_id')
                    ->relationship('pembimbingPerusahaan', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('judulKegiatan')
                    ->label('Judul Kegiatan')
                    ->required()
                    ->maxLength(255),
                DateTimePicker::make('tanggalMulai')
                    ->required(),
                DateTimePicker::make('tanggalSelesai')
                    ->required(),
                TextInput::make('durasiHari')
                    ->required()
                    ->numeric(),
                TextInput::make('divisiTempat')
                    ->required(),
                Textarea::make('deskripsiTugas')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('dokumentasi')
                    ->disk('public')
                    ->directory('kegiatan-dokumentasi')
                    ->acceptedFileTypes(['image/*', 'video/*']) // Mendukung foto dan video
                    ->downloadable()
                    ->openable()
                    ->default(null),
                Select::make('statusKegiatan')
                    ->options([
                        'aktif' => 'Aktif',
                        'pending' => 'Pending',
                        'selesai' => 'Selesai',
                    ])
                    ->required()
                    ->default('aktif'),
            ]);
    }
}
