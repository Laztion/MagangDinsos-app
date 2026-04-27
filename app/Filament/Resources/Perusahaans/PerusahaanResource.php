<?php

namespace App\Filament\Resources\Perusahaans;

use App\Filament\Resources\Perusahaans\Pages\CreatePerusahaan;
use App\Filament\Resources\Perusahaans\Pages\EditPerusahaan;
use App\Filament\Resources\Perusahaans\Pages\ListPerusahaans;
use App\Filament\Resources\Perusahaans\Pages\ViewPerusahaan;
use App\Filament\Resources\Perusahaans\Schemas\PerusahaanForm;
use App\Filament\Resources\Perusahaans\Schemas\PerusahaanInfolist;
use App\Filament\Resources\Perusahaans\Tables\PerusahaansTable;
use App\Models\Perusahaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PerusahaanResource extends Resource
{
    protected static ?string $model = Perusahaan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function canAccess(): bool
    {
        return auth()->user()->can('access ' . class_basename(static::class));
    }

    public static function form(Schema $schema): Schema
    {
        return PerusahaanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PerusahaanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PerusahaansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPerusahaans::route('/'),
            'create' => CreatePerusahaan::route('/create'),
            'view' => ViewPerusahaan::route('/{record}'),
            'edit' => EditPerusahaan::route('/{record}/edit'),
        ];
    }
}
