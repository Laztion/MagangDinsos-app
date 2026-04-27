<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema

            ->schema([
                Grid::make(2)->schema([
                    TextInput::make('name')
                        ->required(),

                    TextInput::make('email')
                        ->label('Email address')
                        ->email()
                        ->required(),
                    DateTimePicker::make('email_verified_at'),
                    TextInput::make('password')
                        ->password()
                        ->required(),
                    Select::make('roles')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable(),

                    Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
                ]),
            ]);
    }
}
