<?php

namespace App\Filament\Resources\KartuMagangs\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KartuMagangForm
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
                TextInput::make('universitas_id')
                    ->required()
                    ->numeric(),
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
