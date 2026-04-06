<?php

namespace App\Filament\Resources\Penilaians\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PenilaianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kegiatan_magang_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pembimbing_perusahaan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pembimbing_universitas_id')
                    ->required()
                    ->numeric(),
                TextInput::make('nilaiKehadiran')
                    ->required()
                    ->numeric(),
                TextInput::make('nilaiSikap')
                    ->required()
                    ->numeric(),
                TextInput::make('nilaiKomunikasi')
                    ->required()
                    ->numeric(),
                TextInput::make('nilaiProaktif')
                    ->required()
                    ->numeric(),
                TextInput::make('nilaiAkhir')
                    ->required()
                    ->numeric(),
                Textarea::make('komentar')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('tanggalPenilaian')
                    ->required(),
            ]);
    }
}
