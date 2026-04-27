<?php

namespace App\Filament\Resources\Mahasiswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;

class MahasiswasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Stack::make([
                    ImageColumn::make('foto')
                        ->circular()
                        ->alignCenter()
                        ->size(100)
                        ->disk('public')
                        ->defaultImageUrl(fn ($record) => "https://ui-avatars.com/api/?name=" . urlencode($record->nama) . "&color=FFFFFF&background=10b981")
                        ->extraAttributes(['class' => 'mb-4 mx-auto shadow-md border-4 border-white dark:border-gray-800']),
                    
                    Stack::make([
                        TextColumn::make('nama')
                            ->weight('bold')
                            ->size('lg')
                            ->searchable()
                            ->alignCenter()
                            ->extraAttributes(['class' => 'leading-tight']),
                        
                        TextColumn::make('nim')
                            ->size('sm')
                            ->color('gray')
                            ->searchable()
                            ->alignCenter(),
                    ])->space(1),

                    Stack::make([
                        TextColumn::make('universitas.namaUniversitas')
                            ->size('sm')
                            ->weight('bold')
                            ->color('primary')
                            ->searchable()
                            ->alignCenter(),
                        
                        TextColumn::make('programStudi')
                            ->size('xs')
                            ->color('gray')
                            ->searchable()
                            ->alignCenter(),
                    ])->space(1),

                    Stack::make([
                        TextColumn::make('email')
                            ->icon('heroicon-m-envelope')
                            ->size('xs')
                            ->color('gray')
                            ->alignCenter(),
                        
                        TextColumn::make('noTelepon')
                            ->icon('heroicon-m-phone')
                            ->size('xs')
                            ->color('gray')
                            ->alignCenter(),
                    ])->space(1)->extraAttributes(['class' => 'mt-4 border-t pt-4 border-gray-100 dark:border-gray-800']),
                ])->space(3)->extraAttributes(['class' => 'p-6']),

                Split::make([
                        TextColumn::make('jenisKelamin')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Laki-laki' => 'info',
                                'Perempuan' => 'danger',
                                default => 'gray',
                            })
                            ->alignCenter(),
                        
                        TextColumn::make('statusKeaktifan')
                            ->badge()
                            ->label('Status')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Aktif' : 'Non-aktif')
                            ->color(fn (bool $state): string => $state ? 'success' : 'danger')
                            ->alignCenter(),
                    ])->extraAttributes(['class' => 'mt-2 justify-center gap-2']),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->iconButton(),
                DeleteAction::make()
                    ->iconButton(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
