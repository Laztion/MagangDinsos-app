<?php

namespace App\Filament\Resources\RiwayatMagangs\Pages;

use App\Filament\Resources\RiwayatMagangs\RiwayatMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditRiwayatMagang extends EditRecord
{
    protected static string $resource = RiwayatMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
