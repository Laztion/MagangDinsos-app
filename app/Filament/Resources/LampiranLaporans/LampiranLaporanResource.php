<?php

namespace App\Filament\Resources\LampiranLaporans;

use App\Filament\Resources\LampiranLaporans\Pages\CreateLampiranLaporan;
use App\Filament\Resources\LampiranLaporans\Pages\EditLampiranLaporan;
use App\Filament\Resources\LampiranLaporans\Pages\ListLampiranLaporans;
use App\Filament\Resources\LampiranLaporans\Pages\ViewLampiranLaporan;
use App\Filament\Resources\LampiranLaporans\Schemas\LampiranLaporanForm;
use App\Filament\Resources\LampiranLaporans\Schemas\LampiranLaporanInfolist;
use App\Filament\Resources\LampiranLaporans\Tables\LampiranLaporansTable;
use App\Models\LampiranLaporan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LampiranLaporanResource extends Resource
{
    protected static ?string $model = LampiranLaporan::class;
    protected static ?int $navigationSort = 3;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Magang Management';

    protected static ?string $recordTitleAttribute = 'id';

    public static function canAccess(): bool
    {
        return auth()->user()->can('access ' . class_basename(static::class));
    }

    public static function form(Schema $schema): Schema
    {
        return LampiranLaporanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LampiranLaporanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LampiranLaporansTable::configure($table);
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
            'index' => ListLampiranLaporans::route('/'),
            'create' => CreateLampiranLaporan::route('/create'),
            'view' => ViewLampiranLaporan::route('/{record}'),
            'edit' => EditLampiranLaporan::route('/{record}/edit'),
        ];
    }
}
