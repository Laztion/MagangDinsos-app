<?php

namespace App\Filament\Resources\PembimbingUniversitas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PembimbingUniversitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nip')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('noTelepon')
                    ->default(null),
                TextInput::make('departemen')
                    ->required(),
                TextInput::make('bidangKeahlian')
                    ->default(null),
            ]);
    }
}
