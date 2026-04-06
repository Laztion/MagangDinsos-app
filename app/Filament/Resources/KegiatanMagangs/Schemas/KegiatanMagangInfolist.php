<?php

namespace App\Filament\Resources\KegiatanMagangs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Http\UploadedFile;

class KegiatanMagangInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('mahasiswa_id')
                    ->numeric(),
                TextEntry::make('perusahaan_id')
                    ->numeric(),
                TextEntry::make('pembimbing_universitas_id')
                    ->numeric(),
                TextEntry::make('pembimbing_perusahaan_id')
                    ->numeric(),
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
                UploadedFile::make('dokumentasi')
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
