<?php

namespace App\Filament\Resources\Mahasiswas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
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
                        ->size(100)
                        ->extraAttributes(['class' => 'mb-4 mx-auto']),
                    
                    Stack::make([
                        TextColumn::make('nama')
                            ->weight('bold')
                            ->size('lg')
                            ->searchable()
                            ->alignCenter(),
                        
                        TextColumn::make('nim')
                            ->size('sm')
                            ->color('gray')
                            ->searchable()
                            ->alignCenter(),
                    ])->space(1),

                    Stack::make([
                        TextColumn::make('universitas.namaUniversitas')
                            ->size('sm')
                            ->weight('medium')
                            ->color('primary')
                            ->searchable()
                            ->alignCenter(),
                        
                        TextColumn::make('programStudi')
                            ->size('xs')
                            ->color('gray')
                            ->searchable()
                            ->alignCenter(),
                    ])->space(1),

                    Split::make([
                        TextColumn::make('jenisKelamin')
                            ->badge()
                            ->alignCenter(),
                        
                        IconColumn::make('statusKeaktifan')
                            ->boolean()
                            ->alignCenter(),
                    ])->extraAttributes(['class' => 'mt-2 justify-center']),

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
                ])->space(3)->extraAttributes(['class' => 'p-4']),
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
