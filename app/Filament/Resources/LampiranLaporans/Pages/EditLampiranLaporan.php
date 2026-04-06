<?php

namespace App\Filament\Resources\LampiranLaporans\Pages;

use App\Filament\Resources\LampiranLaporans\LampiranLaporanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLampiranLaporan extends EditRecord
{
    protected static string $resource = LampiranLaporanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
