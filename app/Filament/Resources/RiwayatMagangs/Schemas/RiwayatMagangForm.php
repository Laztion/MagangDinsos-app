<?php

namespace App\Filament\Resources\RiwayatMagangs\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RiwayatMagangForm
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
                DatePicker::make('tanggalMulai')
                    ->required(),
                DatePicker::make('tanggalSelesai')
                    ->required(),
                TextInput::make('divisiTempat')
                    ->required(),
                TextInput::make('namaPerusahaan')
                    ->required(),
                TextInput::make('namaPembimbingPerusahaan')
                    ->required(),
                TextInput::make('statusKompetensi')
                    ->default(null),
                TextInput::make('nilaiAkhir')
                    ->numeric()
                    ->default(null),
                Textarea::make('catatan')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('tanggalTercatat')
                    ->required(),
            ]);
    }
}
