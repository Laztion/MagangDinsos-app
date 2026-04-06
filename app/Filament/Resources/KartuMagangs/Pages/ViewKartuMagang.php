<?php

namespace App\Filament\Resources\KartuMagangs\Pages;

use App\Filament\Resources\KartuMagangs\KartuMagangResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKartuMagang extends ViewRecord
{
    protected static string $resource = KartuMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
