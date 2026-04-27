<?php

namespace App\Filament\Resources\PembimbingUniversitas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PembimbingUniversitasInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user.name')
                    ->label('Nama Pengguna'),
                TextEntry::make('universitas.namaUniversitas')
                    ->label('Universitas'),
                TextEntry::make('nama'),
                TextEntry::make('nip'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('noTelepon')
                    ->placeholder('-'),
                TextEntry::make('departemen'),
                TextEntry::make('bidangKeahlian')
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
