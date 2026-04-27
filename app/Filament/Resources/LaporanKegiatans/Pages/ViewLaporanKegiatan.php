<?php

namespace App\Filament\Resources\LaporanKegiatans\Pages;

use App\Filament\Resources\LaporanKegiatans\LaporanKegiatanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewLaporanKegiatan extends ViewRecord
{
    protected static string $resource = LaporanKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
