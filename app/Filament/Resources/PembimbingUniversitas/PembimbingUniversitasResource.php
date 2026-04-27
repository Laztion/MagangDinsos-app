<?php

namespace App\Filament\Resources\PembimbingUniversitas;

use App\Filament\Resources\PembimbingUniversitas\Pages\CreatePembimbingUniversitas;
use App\Filament\Resources\PembimbingUniversitas\Pages\EditPembimbingUniversitas;
use App\Filament\Resources\PembimbingUniversitas\Pages\ListPembimbingUniversitas;
use App\Filament\Resources\PembimbingUniversitas\Pages\ViewPembimbingUniversitas;
use App\Filament\Resources\PembimbingUniversitas\Schemas\PembimbingUniversitasForm;
use App\Filament\Resources\PembimbingUniversitas\Schemas\PembimbingUniversitasInfolist;
use App\Filament\Resources\PembimbingUniversitas\Tables\PembimbingUniversitasTable;
use App\Models\PembimbingUniversitas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PembimbingUniversitasResource extends Resource
{
    protected static ?string $model = PembimbingUniversitas::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Detail Pengguna';

    protected static ?string $recordTitleAttribute = 'id';

    public static function canAccess(): bool
    {
        return auth()->user()->can('access ' . class_basename(static::class));
    }

    public static function form(Schema $schema): Schema
    {
        return PembimbingUniversitasForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PembimbingUniversitasInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PembimbingUniversitasTable::configure($table);
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
            'index' => ListPembimbingUniversitas::route('/'),
            'create' => CreatePembimbingUniversitas::route('/create'),
            'view' => ViewPembimbingUniversitas::route('/{record}'),
            'edit' => EditPembimbingUniversitas::route('/{record}/edit'),
        ];
    }
}
