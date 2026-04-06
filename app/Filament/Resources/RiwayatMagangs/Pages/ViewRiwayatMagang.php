<?php

namespace App\Filament\Resources\RiwayatMagangs\Pages;

use App\Filament\Resources\RiwayatMagangs\RiwayatMagangResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewRiwayatMagang extends ViewRecord
{
    protected static string $resource = RiwayatMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
