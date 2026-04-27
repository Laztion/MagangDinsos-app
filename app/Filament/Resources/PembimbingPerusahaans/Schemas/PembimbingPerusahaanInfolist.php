<?php

namespace App\Filament\Resources\PembimbingPerusahaans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PembimbingPerusahaanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('perusahaan.namaPerusahaan')
                    ->label('Perusahaan'),
                TextEntry::make('nama'),
                TextEntry::make('posisi'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('noTelepon')
                    ->placeholder('-'),
                TextEntry::make('bidangKeahlian')
                    ->placeholder('-'),
                TextEntry::make('tanggalDaftarSebagaiPembimbing')
                    ->date(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
