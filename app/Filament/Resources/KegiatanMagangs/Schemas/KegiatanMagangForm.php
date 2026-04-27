<?php

namespace App\Filament\Resources\KegiatanMagangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KegiatanMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mahasiswa_id')
                    ->relationship('mahasiswa', 'nama')
                    ->default(fn() => auth()->user()->mahasiswa?->id)
                    ->hidden(fn() => auth()->user()->hasRole('Mahasiswa'))
                    ->dehydrated() // Ensure it's sent to the server even if hidden
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
                TextInput::make('dokumentasi')
                    ->default(null),
                TextInput::make('statusKegiatan')
                    ->required()
                    ->default('aktif'),
            ]);
    }
}
