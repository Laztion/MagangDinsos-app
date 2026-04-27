<?php

namespace App\Filament\Resources\KartuMagangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KartuMagangForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('mahasiswa_id')
                    ->relationship('mahasiswa', 'nama')
                    ->default(fn() => auth()->user()->mahasiswa?->id)
                    ->hidden(fn() => auth()->user()->mahasiswa !== null)
                    ->dehydrated()
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('kegiatan_magang_id')
                    ->relationship('kegiatanMagang', 'judulKegiatan', function ($query) {
                        if (auth()->user()->mahasiswa !== null) {
                            return $query->where('mahasiswa_id', auth()->user()->mahasiswa?->id);
                        }
                        return $query;
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('universitas_id')
                    ->relationship('universitas', 'namaUniversitas')
                    ->default(fn() => auth()->user()->mahasiswa?->universitas_id)
                    ->hidden(fn() => auth()->user()->mahasiswa !== null)
                    ->dehydrated()
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('tanggalMulai')
                    ->required(),
                DatePicker::make('tanggalSelesai')
                    ->required(),
                TextInput::make('statusKartu')
                    ->required()
                    ->default('aktif'),
                DatePicker::make('tanggalCetak'),
                DatePicker::make('tanggalCetakUlang'),
            ]);
    }
}
