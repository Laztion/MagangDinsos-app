<?php

namespace App\Filament\Resources\KegiatanMagangs\Pages;

use App\Filament\Resources\KegiatanMagangs\KegiatanMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKegiatanMagangs extends ListRecords
{
    protected static string $resource = KegiatanMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
