<?php

namespace App\Filament\Resources\LaporanKegiatans\Schemas;

use Filament\Forms\Components\Select;
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
                Select::make('kegiatan_magang_id')
                    ->relationship('kegiatanMagang', 'judulKegiatan', function ($query) {
                        if (auth()->user()->hasRole('Mahasiswa')) {
                            return $query->where('mahasiswa_id', auth()->user()->mahasiswa?->id);
                        }
                        return $query;
                    })
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('mahasiswa_id')
                    ->relationship('mahasiswa', 'nama')
                    ->default(fn() => auth()->user()->mahasiswa?->id)
                    ->hidden(fn() => auth()->user()->hasRole('Mahasiswa'))
                    ->dehydrated()
                    ->searchable()
                    ->preload()
                    ->required(),
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
