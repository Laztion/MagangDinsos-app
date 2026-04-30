<?php

namespace App\Filament\Resources\Universitas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;

class UniversitasTable
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
                    ImageColumn::make('logo')
                        ->circular()
                        ->alignCenter()
                        ->size(100)
                        ->defaultImageUrl(fn ($record) => "https://ui-avatars.com/api/?name=" . urlencode($record->namaUniversitas) . "&color=FFFFFF&background=10b981")
                        ->extraImgAttributes(['class' => 'mb-4 mx-auto shadow-md border-4 border-white dark:border-gray-800']),
                    
                    Stack::make([
                        TextColumn::make('namaUniversitas')
                            ->weight('bold')
                            ->size('lg')
                            ->searchable()
                            ->alignCenter()
                            ->extraAttributes(['class' => 'leading-tight']),
                        
                        TextColumn::make('kota')
                            ->size('sm')
                            ->color('gray')
                            ->searchable()
                            ->alignCenter(),
                    ])->space(1),

                    Stack::make([
                        TextColumn::make('alamat')
                            ->size('xs')
                            ->color('gray')
                            ->searchable()
                            ->alignCenter()
                            ->wrap(),
                    ])->extraAttributes(['class' => 'mt-2']),

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
