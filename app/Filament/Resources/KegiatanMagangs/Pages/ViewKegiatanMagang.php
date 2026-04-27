<?php

namespace App\Filament\Resources\KegiatanMagangs\Pages;

use App\Filament\Resources\KegiatanMagangs\KegiatanMagangResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKegiatanMagang extends ViewRecord
{
    protected static string $resource = KegiatanMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
