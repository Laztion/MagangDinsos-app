<?php

namespace App\Filament\Resources\LaporanKegiatans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LaporanKegiatanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kegiatan_magang_id')
                    ->numeric(),
                TextEntry::make('mahasiswa_id')
                    ->numeric(),
                TextEntry::make('tanggalLaporan')
                    ->date(),
                TextEntry::make('aktivitasKegiatan')
                    ->columnSpanFull(),
                TextEntry::make('hasilPekerjaan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('hambatanDanSolusi')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('jamKerja')
                    ->numeric(),
                TextEntry::make('statusLaporan'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
