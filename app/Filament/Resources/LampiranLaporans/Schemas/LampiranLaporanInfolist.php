<?php

namespace App\Filament\Resources\LampiranLaporans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LampiranLaporanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('laporan_kegiatan_id')
                    ->numeric(),
                TextEntry::make('namaFile'),
                TextEntry::make('tipeFile'),
                TextEntry::make('urlFile'),
                TextEntry::make('tanggalUpload')
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
