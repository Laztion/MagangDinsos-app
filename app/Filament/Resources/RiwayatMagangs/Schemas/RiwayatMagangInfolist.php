<?php

namespace App\Filament\Resources\RiwayatMagangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class RiwayatMagangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mahasiswa.nama')
                    ->label('Mahasiswa'),
                TextEntry::make('kegiatanMagang.judulKegiatan')
                    ->label('Kegiatan Magang'),
                TextEntry::make('tanggalMulai')
                    ->date(),
                TextEntry::make('tanggalSelesai')
                    ->date(),
                TextEntry::make('divisiTempat'),
                TextEntry::make('namaPerusahaan'),
                TextEntry::make('namaPembimbingPerusahaan'),
                TextEntry::make('statusKompetensi')
                    ->placeholder('-'),
                TextEntry::make('nilaiAkhir')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('catatan')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tanggalTercatat')
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
