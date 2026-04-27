<?php

namespace App\Filament\Resources\LampiranLaporans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LampiranLaporanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('laporan_kegiatan_id')
                    ->relationship('laporanKegiatan', 'id')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('namaFile')
                    ->required(),
                TextInput::make('tipeFile')
                    ->required(),
                TextInput::make('urlFile')
                    ->required(),
                DateTimePicker::make('tanggalUpload')
                    ->required(),
            ]);
    }
}
