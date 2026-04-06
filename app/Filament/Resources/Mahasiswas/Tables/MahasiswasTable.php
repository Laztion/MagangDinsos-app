<?php

namespace App\Filament\Resources\Mahasiswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MahasiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('statusKeaktifan')
                    ->boolean(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('nim')
                    ->searchable(),
                TextColumn::make('jenisKelamin')
                    ->badge(),
                TextColumn::make('tanggalLahir')
                    ->date()
                    ->sortable(),
                TextColumn::make('tempatLahir')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('noTelepon')
                    ->searchable(),
                TextColumn::make('universitas')
                    ->searchable(),
                TextColumn::make('fakultas')
                    ->searchable(),
                TextColumn::make('programStudi')
                    ->searchable(),
                TextColumn::make('kelas')
                    ->searchable(),
                TextColumn::make('semester')
                    ->searchable(),
                TextColumn::make('tanggalDaftar')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('foto')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
