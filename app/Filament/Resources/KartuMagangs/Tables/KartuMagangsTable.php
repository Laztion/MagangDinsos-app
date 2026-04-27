<?php

namespace App\Filament\Resources\KartuMagangs\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KartuMagangsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mahasiswa.nama')
                    ->label('Mahasiswa')
                    ->searchable(),
                TextColumn::make('kegiatanMagang.judulKegiatan')
                    ->label('Kegiatan Magang')
                    ->searchable(),
                TextColumn::make('universitas.namaUniversitas')
                    ->label('Universitas')
                    ->searchable(),
                TextColumn::make('tanggalMulai')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggalSelesai')
                    ->date()
                    ->sortable(),
                TextColumn::make('statusKartu')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'aktif'    => 'success',
                        'nonaktif' => 'danger',
                        default    => 'gray',
                    }),
                TextColumn::make('tanggalCetak')
                    ->date()
                    ->sortable(),
                TextColumn::make('tanggalCetakUlang')
                    ->date()
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
                    Action::make('cetak')
                        ->label('Cetak Kartu')
                        ->icon('heroicon-o-printer')
                        ->color('success')
                        ->url(fn ($record) => route('kartu-magang.cetak', $record))
                        ->openUrlInNewTab(),
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

