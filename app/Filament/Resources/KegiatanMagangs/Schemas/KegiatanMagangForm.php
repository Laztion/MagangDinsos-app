<?php

namespace App\Filament\Resources\KegiatanMagangs\Schemas;

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
                TextInput::make('mahasiswa_id')
                    ->required()
                    ->numeric(),
                TextInput::make('perusahaan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pembimbing_universitas_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pembimbing_perusahaan_id')
                    ->required()
                    ->numeric(),
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
