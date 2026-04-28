<?php

namespace App\Filament\Resources\LaporanKegiatans\Tables;

use App\Models\LaporanKegiatan;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

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
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'submitted' => 'info',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()
                    ->label('Export Excel')
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->exports([
                        \pxlrbt\FilamentExcel\Exports\ExcelExport::make()
                            ->fromTable()
                            ->withFilename('Laporan_Magang_' . date('Y-m-d'))
                            ->withColumns([
                                \pxlrbt\FilamentExcel\Columns\Column::make('mahasiswa.nama')
                                    ->heading('Nama Mahasiswa'),
                                \pxlrbt\FilamentExcel\Columns\Column::make('kegiatanMagang.judulKegiatan')
                                    ->heading('Judul Kegiatan'),
                                \pxlrbt\FilamentExcel\Columns\Column::make('tanggalLaporan')
                                    ->heading('Tanggal Laporan'),
                                \pxlrbt\FilamentExcel\Columns\Column::make('kegiatanMagang.deskripsiTugas')
                                    ->heading('Detail Aktivitas'),
                                \pxlrbt\FilamentExcel\Columns\Column::make('jamKerja')
                                    ->heading('Durasi (Jam)'),
                                \pxlrbt\FilamentExcel\Columns\Column::make('statusLaporan')
                                    ->heading('Status'),
                            ])
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->label('Export Selected')
                        ->exports([
                            \pxlrbt\FilamentExcel\Exports\ExcelExport::make()
                                ->fromTable()
                                ->withColumns([
                                    \pxlrbt\FilamentExcel\Columns\Column::make('mahasiswa.nama')->heading('Mahasiswa'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('tanggalLaporan')->heading('Tanggal'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('aktivitasKegiatan')->heading('Aktivitas'),
                                ])
                        ]),
                ]),
            ]);
    }
}
