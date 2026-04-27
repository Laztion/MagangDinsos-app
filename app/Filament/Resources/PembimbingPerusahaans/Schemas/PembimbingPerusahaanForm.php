<?php

namespace App\Filament\Resources\PembimbingPerusahaans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembimbingPerusahaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('perusahaan_id')
                    ->required()
                    ->label('Perusahaan')
                    ->relationship('perusahaan', 'namaPerusahaan'),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('posisi')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('noTelepon')
                    ->default(null),
                TextInput::make('bidangKeahlian')
                    ->default(null),
                DatePicker::make('tanggalDaftarSebagaiPembimbing')
                    ->required(),
            ]);
    }
}
