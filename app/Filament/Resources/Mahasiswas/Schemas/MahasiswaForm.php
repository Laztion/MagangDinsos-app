<?php

namespace App\Filament\Resources\Mahasiswas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MahasiswaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->required()
                    ->label('Nama Pengguna')
                    ->relationship('user', 'name'),
                Toggle::make('statusKeaktifan')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('nim')
                    ->required(),
                Select::make('jenisKelamin')
                    ->options(['Laki-laki' => 'Laki laki', 'Perempuan' => 'Perempuan'])
                    ->required(),
                Textarea::make('alamat')
                    ->default(null)
                    ->columnSpanFull(),
                DatePicker::make('tanggalLahir')
                    ->required(),
                TextInput::make('tempatLahir')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('noTelepon')
                    ->default(null),
                Select::make('universitas')
                    ->required()
                    ->label('Universitas')
                    ->relationship('universitas', 'namaUniversitas'),
                TextInput::make('fakultas')
                    ->default(null),
                TextInput::make('programStudi')
                    ->default(null),
                TextInput::make('kelas')
                    ->required(),
                TextInput::make('semester')
                    ->required(),
                DateTimePicker::make('tanggalDaftar')
                    ->required(),
                TextInput::make('foto')
                    ->default(null),
            ]);
    }
}
