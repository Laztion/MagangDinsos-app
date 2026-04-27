<?php

namespace App\Filament\Resources\LaporanKegiatans\Pages;

use App\Filament\Resources\LaporanKegiatans\LaporanKegiatanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLaporanKegiatan extends EditRecord
{
    protected static string $resource = LaporanKegiatanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
