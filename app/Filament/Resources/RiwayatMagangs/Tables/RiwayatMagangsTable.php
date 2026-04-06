<?php

namespace App\Filament\Resources\RiwayatMagangs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RiwayatMagangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mahasiswa_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kegiatan_magang_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggalMulai')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggalSelesai')
                    ->date()
                    ->sortable(),
                TextColumn::make('divisiTempat')
                    ->searchable(),
                TextColumn::make('namaPerusahaan')
                    ->searchable(),
                TextColumn::make('namaPembimbingPerusahaan')
                    ->searchable(),
                TextColumn::make('statusKompetensi')
                    ->searchable(),
                TextColumn::make('nilaiAkhir')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggalTercatat')
                    ->dateTime()
                    ->sortable(),
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
