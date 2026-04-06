<?php

namespace App\Filament\Resources\PembimbingUniversitas\Pages;

use App\Filament\Resources\PembimbingUniversitas\PembimbingUniversitasResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPembimbingUniversitas extends ViewRecord
{
    protected static string $resource = PembimbingUniversitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
