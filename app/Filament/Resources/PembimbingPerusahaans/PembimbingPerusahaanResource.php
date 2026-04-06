<?php

namespace App\Filament\Resources\PembimbingPerusahaans;

use App\Filament\Resources\PembimbingPerusahaans\Pages\CreatePembimbingPerusahaan;
use App\Filament\Resources\PembimbingPerusahaans\Pages\EditPembimbingPerusahaan;
use App\Filament\Resources\PembimbingPerusahaans\Pages\ListPembimbingPerusahaans;
use App\Filament\Resources\PembimbingPerusahaans\Pages\ViewPembimbingPerusahaan;
use App\Filament\Resources\PembimbingPerusahaans\Schemas\PembimbingPerusahaanForm;
use App\Filament\Resources\PembimbingPerusahaans\Schemas\PembimbingPerusahaanInfolist;
use App\Filament\Resources\PembimbingPerusahaans\Tables\PembimbingPerusahaansTable;
use App\Models\PembimbingPerusahaan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PembimbingPerusahaanResource extends Resource
{
    protected static ?string $model = PembimbingPerusahaan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Detail Pengguna';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return PembimbingPerusahaanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PembimbingPerusahaanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PembimbingPerusahaansTable::configure($table);
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
            'index' => ListPembimbingPerusahaans::route('/'),
            'create' => CreatePembimbingPerusahaan::route('/create'),
            'view' => ViewPembimbingPerusahaan::route('/{record}'),
            'edit' => EditPembimbingPerusahaan::route('/{record}/edit'),
        ];
    }
}
