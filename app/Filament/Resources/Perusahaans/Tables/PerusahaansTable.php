<?php

namespace App\Filament\Resources\Perusahaans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;

class PerusahaansTable
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
                        ->defaultImageUrl(fn ($record) => "https://ui-avatars.com/api/?name=" . urlencode($record->namaPerusahaan) . "&color=FFFFFF&background=10b981")
                        ->extraAttributes(['class' => 'mb-4 mx-auto shadow-md border-4 border-white dark:border-gray-800']),
                    
                    Stack::make([
                        TextColumn::make('namaPerusahaan')
                            ->weight('bold')
                            ->size('lg')
                            ->searchable()
                            ->alignCenter()
                            ->extraAttributes(['class' => 'leading-tight']),
                        
                        TextColumn::make('sektorIndustri')
                            ->size('sm')
                            ->color('primary')
                            ->weight('bold')
                            ->searchable()
                            ->alignCenter(),
                    ])->space(1),

                    Stack::make([
                        TextColumn::make('namaPIC')
                            ->label('PIC')
                            ->icon('heroicon-m-user')
                            ->size('xs')
                            ->color('gray')
                            ->alignCenter(),
                        
                        TextColumn::make('email')
                            ->icon('heroicon-m-envelope')
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
