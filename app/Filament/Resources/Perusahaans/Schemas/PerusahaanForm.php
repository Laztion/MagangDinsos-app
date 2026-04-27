<?php

namespace App\Filament\Resources\Perusahaans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PerusahaanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('namaPerusahaan')
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                TextInput::make('kota')
                    ->required(),
                TextInput::make('provinsi')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('sektorIndustri')
                    ->default(null),
                TextInput::make('namaPIC')
                    ->default(null),
                TextInput::make('kontakPIC')
                    ->default(null),
            ]);
    }
}
