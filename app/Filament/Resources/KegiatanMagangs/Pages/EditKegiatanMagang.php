<?php

namespace App\Filament\Resources\KegiatanMagangs\Pages;

use App\Filament\Resources\KegiatanMagangs\KegiatanMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanMagang extends EditRecord
{
    protected static string $resource = KegiatanMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
