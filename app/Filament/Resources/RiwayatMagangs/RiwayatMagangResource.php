<?php

namespace App\Filament\Resources\RiwayatMagangs;

use App\Filament\Resources\RiwayatMagangs\Pages\CreateRiwayatMagang;
use App\Filament\Resources\RiwayatMagangs\Pages\EditRiwayatMagang;
use App\Filament\Resources\RiwayatMagangs\Pages\ListRiwayatMagangs;
use App\Filament\Resources\RiwayatMagangs\Pages\ViewRiwayatMagang;
use App\Filament\Resources\RiwayatMagangs\Schemas\RiwayatMagangForm;
use App\Filament\Resources\RiwayatMagangs\Schemas\RiwayatMagangInfolist;
use App\Filament\Resources\RiwayatMagangs\Tables\RiwayatMagangsTable;
use App\Models\RiwayatMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RiwayatMagangResource extends Resource
{
    protected static ?string $model = RiwayatMagang::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return RiwayatMagangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RiwayatMagangInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RiwayatMagangsTable::configure($table);
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
            'index' => ListRiwayatMagangs::route('/'),
            'create' => CreateRiwayatMagang::route('/create'),
            'view' => ViewRiwayatMagang::route('/{record}'),
            'edit' => EditRiwayatMagang::route('/{record}/edit'),
        ];
    }
}
