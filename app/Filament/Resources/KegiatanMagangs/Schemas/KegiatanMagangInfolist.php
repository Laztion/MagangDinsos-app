<?php

namespace App\Filament\Resources\KegiatanMagangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;

class KegiatanMagangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mahasiswa.nama')
                    ->label('Mahasiswa'),
                TextEntry::make('perusahaan.namaPerusahaan')
                    ->label('Perusahaan'),
                TextEntry::make('pembimbingUniversitas.nama')
                    ->label('Pembimbing Universitas'),
                TextEntry::make('pembimbingPerusahaan.nama')
                    ->label('Pembimbing Perusahaan'),
                TextEntry::make('judulKegiatan'),
                TextEntry::make('tanggalMulai')
                    ->dateTime(),
                TextEntry::make('tanggalSelesai')
                    ->dateTime(),
                TextEntry::make('durasiHari')
                    ->numeric(),
                TextEntry::make('divisiTempat'),
                TextEntry::make('deskripsiTugas')
                    ->columnSpanFull(),
                ImageEntry::make('dokumentasi')
                    ->disk('public')
                    ->visibility('public')
                    ->placeholder('-'),
                TextEntry::make('statusKegiatan'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
