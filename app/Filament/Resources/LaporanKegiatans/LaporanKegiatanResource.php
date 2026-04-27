<?php

namespace App\Filament\Resources\LaporanKegiatans;

use App\Filament\Resources\LaporanKegiatans\Pages\CreateLaporanKegiatan;
use App\Filament\Resources\LaporanKegiatans\Pages\EditLaporanKegiatan;
use App\Filament\Resources\LaporanKegiatans\Pages\ListLaporanKegiatans;
use App\Filament\Resources\LaporanKegiatans\Pages\ViewLaporanKegiatan;
use App\Filament\Resources\LaporanKegiatans\Schemas\LaporanKegiatanForm;
use App\Filament\Resources\LaporanKegiatans\Schemas\LaporanKegiatanInfolist;
use App\Filament\Resources\LaporanKegiatans\Tables\LaporanKegiatansTable;
use App\Models\LaporanKegiatan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class LaporanKegiatanResource extends Resource
{
    protected static ?string $model = LaporanKegiatan::class;
    protected static ?int $navigationSort = 2;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Magang Management';

    protected static ?string $recordTitleAttribute = 'id';

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if (!$user) return $query;

        if ($user->pembimbingUniversitas !== null) {
            $pembimbing = $user->pembimbingUniversitas;
            if ($pembimbing) {
                $query->whereHas('mahasiswa', function ($q) use ($pembimbing) {
                    $q->where('universitas_id', $pembimbing->universitas_id);
                });
            }
        }

        if ($user->mahasiswa !== null) {
            $mahasiswa = $user->mahasiswa;
            if ($mahasiswa) {
                $query->where('mahasiswa_id', $mahasiswa->id);
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        return $query;
    }



    public static function form(Schema $schema): Schema
    {
        return LaporanKegiatanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return LaporanKegiatanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LaporanKegiatansTable::configure($table);
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
            'index' => ListLaporanKegiatans::route('/'),
            'create' => CreateLaporanKegiatan::route('/create'),
            'view' => ViewLaporanKegiatan::route('/{record}'),
            'edit' => EditLaporanKegiatan::route('/{record}/edit'),
        ];
    }
}
