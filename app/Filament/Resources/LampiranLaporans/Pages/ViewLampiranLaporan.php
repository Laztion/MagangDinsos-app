<?php

namespace App\Filament\Resources\LampiranLaporans\Pages;

use App\Filament\Resources\LampiranLaporans\LampiranLaporanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLampiranLaporan extends ViewRecord
{
    protected static string $resource = LampiranLaporanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
