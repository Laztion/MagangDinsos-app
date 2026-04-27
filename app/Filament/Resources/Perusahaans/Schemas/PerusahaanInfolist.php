<?php

namespace App\Filament\Resources\Perusahaans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PerusahaanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('namaPerusahaan'),
                TextEntry::make('alamat'),
                TextEntry::make('kota'),
                TextEntry::make('provinsi'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('sektorIndustri')
                    ->placeholder('-'),
                TextEntry::make('namaPIC')
                    ->placeholder('-'),
                TextEntry::make('kontakPIC')
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
