<?php

namespace App\Filament\Resources\RiwayatMagangs\Pages;

use App\Filament\Resources\RiwayatMagangs\RiwayatMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRiwayatMagangs extends ListRecords
{
    protected static string $resource = RiwayatMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
