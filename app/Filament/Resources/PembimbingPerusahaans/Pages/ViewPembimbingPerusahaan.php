<?php

namespace App\Filament\Resources\PembimbingPerusahaans\Pages;

use App\Filament\Resources\PembimbingPerusahaans\PembimbingPerusahaanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPembimbingPerusahaan extends ViewRecord
{
    protected static string $resource = PembimbingPerusahaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
