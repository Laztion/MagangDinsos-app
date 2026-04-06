<?php

namespace App\Filament\Resources\KegiatanMagangs;

use App\Filament\Resources\KegiatanMagangs\Pages\CreateKegiatanMagang;
use App\Filament\Resources\KegiatanMagangs\Pages\EditKegiatanMagang;
use App\Filament\Resources\KegiatanMagangs\Pages\ListKegiatanMagangs;
use App\Filament\Resources\KegiatanMagangs\Pages\ViewKegiatanMagang;
use App\Filament\Resources\KegiatanMagangs\Schemas\KegiatanMagangForm;
use App\Filament\Resources\KegiatanMagangs\Schemas\KegiatanMagangInfolist;
use App\Filament\Resources\KegiatanMagangs\Tables\KegiatanMagangsTable;
use App\Models\KegiatanMagang;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class KegiatanMagangResource extends Resource
{
    protected static ?string $model = KegiatanMagang::class;
    protected static ?int $navigationSort = 1;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Magang Management';

    protected static ?string $recordTitleAttribute = 'judulKegiatan';

    public static function form(Schema $schema): Schema
    {
        return KegiatanMagangForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KegiatanMagangInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KegiatanMagangsTable::configure($table);
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
            'index' => ListKegiatanMagangs::route('/'),
            'create' => CreateKegiatanMagang::route('/create'),
            'view' => ViewKegiatanMagang::route('/{record}'),
            'edit' => EditKegiatanMagang::route('/{record}/edit'),
        ];
    }
}
