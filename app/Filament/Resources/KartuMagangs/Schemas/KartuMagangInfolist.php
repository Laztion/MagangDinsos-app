<?php

namespace App\Filament\Resources\KartuMagangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class KartuMagangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mahasiswa.nama')
                    ->label('Mahasiswa'),
                TextEntry::make('kegiatanMagang.judulKegiatan')
                    ->label('Kegiatan Magang'),
                TextEntry::make('universitas.namaUniversitas')
                    ->label('Universitas'),
                TextEntry::make('tanggalMulai')
                    ->date(),
                TextEntry::make('tanggalSelesai')
                    ->date(),
                TextEntry::make('statusKartu'),
                TextEntry::make('tanggalCetak')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('tanggalCetakUlang')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
