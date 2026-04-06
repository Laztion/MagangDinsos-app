<?php

namespace App\Filament\Resources\Universitas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UniversitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('namaUniversitas')
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                TextInput::make('kota')
                    ->required(),
                TextInput::make('noTelepon')
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->default(null),
                TextInput::make('website')
                    ->url()
                    ->default(null),
            ]);
    }
}
