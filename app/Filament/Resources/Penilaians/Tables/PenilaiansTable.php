<?php

namespace App\Filament\Resources\Penilaians\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PenilaiansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kegiatanMagang.judulKegiatan')
                    ->label('Kegiatan Magang')
                    ->searchable(),
                TextColumn::make('pembimbingPerusahaan.nama')
                    ->label('Pembimbing Perusahaan')
                    ->searchable(),
                TextColumn::make('pembimbingUniversitas.nama')
                    ->label('Pembimbing Universitas')
                    ->searchable(),
                TextColumn::make('nilaiKehadiran')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nilaiSikap')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nilaiKomunikasi')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nilaiProaktif')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nilaiAkhir')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tanggalPenilaian')
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
