<?php

namespace App\Filament\Resources\Mahasiswas;

use App\Filament\Resources\Mahasiswas\Pages\CreateMahasiswa;
use App\Filament\Resources\Mahasiswas\Pages\EditMahasiswa;
use App\Filament\Resources\Mahasiswas\Pages\ListMahasiswas;
use App\Filament\Resources\Mahasiswas\Pages\ViewMahasiswa;
use App\Filament\Resources\Mahasiswas\Schemas\MahasiswaForm;
use App\Filament\Resources\Mahasiswas\Schemas\MahasiswaInfolist;
use App\Filament\Resources\Mahasiswas\Tables\MahasiswasTable;
use App\Models\Mahasiswa;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'id';

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();

        if (!$user) {
            return $query;
        }

        if ($user->hasRole('super_admin') || $user->hasRole('admin')) {
            return $query;
        }

        if ($user->hasRole('pembimbing_universitas')) {
            $pembimbing = $user->pembimbingUniversitas;
            if ($pembimbing) {
                $query->where('universitas_id', $pembimbing->universitas_id);
            }
        }

        if ($user->hasRole('pembimbing_perusahaan')) {
            $pembimbing = $user->pembimbingPerusahaan;
            if ($pembimbing) {
                $query->whereHas('kegiatanMagang', function ($q) use ($pembimbing) {
                    $q->where('perusahaan_id', $pembimbing->perusahaan_id);
                });
            }
        }

        if ($user->hasRole('mahasiswa')) {
            $query->where('user_id', $user->id);
        }

        return $query;
    }



    public static function form(Schema $schema): Schema
    {
        return MahasiswaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MahasiswaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MahasiswasTable::configure($table);
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
            'index' => ListMahasiswas::route('/'),
            'create' => CreateMahasiswa::route('/create'),
            'view' => ViewMahasiswa::route('/{record}'),
            'edit' => EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
