<?php

namespace App\Filament\Resources\LampiranLaporans\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LampiranLaporanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('laporan_kegiatan_id')
                    ->required()
                    ->numeric(),
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
