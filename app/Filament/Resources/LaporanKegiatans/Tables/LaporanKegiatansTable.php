<?php

namespace App\Filament\Resources\LaporanKegiatans\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\ActionGroupn;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LaporanKegiatansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kegiatanMagang.judulKegiatan')
                    ->label('Kegiatan Magang')
                    ->searchable(),
                TextColumn::make('mahasiswa.nama')
                    ->label('Mahasiswa')
                    ->searchable(),
                TextColumn::make('tanggalLaporan')
                    ->date()
                    ->sortable(),
                TextColumn::make('jamKerja')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('statusLaporan')
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
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
