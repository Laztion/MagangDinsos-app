<?php

namespace App\Filament\Resources\RiwayatMagangs\Schemas;

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
                TextInput::make('mahasiswa_id')
                    ->required()
                    ->numeric(),
                TextInput::make('kegiatan_magang_id')
                    ->required()
                    ->numeric(),
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
