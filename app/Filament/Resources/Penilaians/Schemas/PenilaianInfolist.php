<?php

namespace App\Filament\Resources\Penilaians\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PenilaianInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kegiatan_magang_id')
                    ->numeric(),
                TextEntry::make('pembimbing_perusahaan_id')
                    ->numeric(),
                TextEntry::make('pembimbing_universitas_id')
                    ->numeric(),
                TextEntry::make('nilaiKehadiran')
                    ->numeric(),
                TextEntry::make('nilaiSikap')
                    ->numeric(),
                TextEntry::make('nilaiKomunikasi')
                    ->numeric(),
                TextEntry::make('nilaiProaktif')
                    ->numeric(),
                TextEntry::make('nilaiAkhir')
                    ->numeric(),
                TextEntry::make('komentar')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tanggalPenilaian')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
