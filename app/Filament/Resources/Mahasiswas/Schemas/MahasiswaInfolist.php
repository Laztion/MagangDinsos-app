<?php

namespace App\Filament\Resources\Mahasiswas\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MahasiswaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                IconEntry::make('statusKeaktifan')
                    ->boolean(),
                TextEntry::make('nama'),
                TextEntry::make('nim'),
                TextEntry::make('jenisKelamin')
                    ->badge(),
                TextEntry::make('alamat')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('tanggalLahir')
                    ->date(),
                TextEntry::make('tempatLahir'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('noTelepon')
                    ->placeholder('-'),
                TextEntry::make('universitas'),
                TextEntry::make('fakultas')
                    ->placeholder('-'),
                TextEntry::make('programStudi')
                    ->placeholder('-'),
                TextEntry::make('kelas'),
                TextEntry::make('semester'),
                TextEntry::make('tanggalDaftar')
                    ->dateTime(),
                TextEntry::make('foto')
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
