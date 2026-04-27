<?php

namespace App\Filament\Resources\Universitas;

use App\Filament\Resources\Universitas\Pages\CreateUniversitas;
use App\Filament\Resources\Universitas\Pages\EditUniversitas;
use App\Filament\Resources\Universitas\Pages\ListUniversitas;
use App\Filament\Resources\Universitas\Pages\ViewUniversitas;
use App\Filament\Resources\Universitas\Schemas\UniversitasForm;
use App\Filament\Resources\Universitas\Schemas\UniversitasInfolist;
use App\Filament\Resources\Universitas\Tables\UniversitasTable;
use App\Models\Universitas;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UniversitasResource extends Resource
{
    protected static ?string $model = Universitas::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';



    public static function form(Schema $schema): Schema
    {
        return UniversitasForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UniversitasInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UniversitasTable::configure($table);
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
            'index' => ListUniversitas::route('/'),
            'create' => CreateUniversitas::route('/create'),
            'view' => ViewUniversitas::route('/{record}'),
            'edit' => EditUniversitas::route('/{record}/edit'),
        ];
    }
}
