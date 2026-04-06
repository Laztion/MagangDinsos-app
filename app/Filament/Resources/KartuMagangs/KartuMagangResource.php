<?php

namespace App\Filament\Resources\KartuMagangs;

use App\Filament\Resources\KartuMagangs\Pages\CreateKartuMagang;
use App\Filament\Resources\KartuMagangs\Pages\EditKartuMagang;
use App\Filament\Resources\KartuMagangs\Pages\ListKartuMagangs;
use App\Filament\Resources\KartuMagangs\Pages\ViewKartuMagang;
use App\Filament\Resources\KartuMagangs\Schemas\KartuMagangForm;
use App\Filament\Resources\KartuMagangs\Schemas\KartuMagangInfolist;
use App\Filament\Resources\KartuMagangs\Tables\KartuMagangsTable;
use App\Models\KartuMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KartuMagangResource extends Resource
{
    protected static ?string $model = KartuMagang::class;
    protected static ?int $navigationSort = 5;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Magang Management';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return KartuMagangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KartuMagangInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KartuMagangsTable::configure($table);
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
            'index' => ListKartuMagangs::route('/'),
            'create' => CreateKartuMagang::route('/create'),
            'view' => ViewKartuMagang::route('/{record}'),
            'edit' => EditKartuMagang::route('/{record}/edit'),
        ];
    }
}
