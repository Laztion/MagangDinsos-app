<?php

namespace App\Filament\Resources\KartuMagangs\Pages;

use App\Filament\Resources\KartuMagangs\KartuMagangResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKartuMagangs extends ListRecords
{
    protected static string $resource = KartuMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
