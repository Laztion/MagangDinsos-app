<?php

namespace App\Filament\Resources\LaporanKegiatans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LaporanKegiatanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kegiatan_magang_id')
                    ->required()
                    ->numeric(),
                TextInput::make('mahasiswa_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggalLaporan')
                    ->required(),
                Textarea::make('aktivitasKegiatan')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('hasilPekerjaan')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('hambatanDanSolusi')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('jamKerja')
                    ->required()
                    ->numeric(),
                TextInput::make('statusLaporan')
                    ->required()
                    ->default('draft'),
            ]);
    }
}
