<?php

namespace App\Filament\Resources\KegiatanMagangs\Tables;

use Dom\Text;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KegiatanMagangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mahasiswa_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('perusahaan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pembimbing_universitas_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pembimbing_perusahaan_id')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('judulKegiatan')
                    ->searchable(),
                TextColumn::make('tanggalMulai')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('tanggalSelesai')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('durasiHari')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('divisiTempat')
                    ->searchable(),
                TextColumn::make('dokumentasi')
                    ->searchable(),
                TextColumn::make('statusKegiatan')
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
