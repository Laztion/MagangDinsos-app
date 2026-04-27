<?php

namespace App\Filament\Resources\KartuMagangs\Pages;

use App\Filament\Resources\KartuMagangs\KartuMagangResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditKartuMagang extends EditRecord
{
    protected static string $resource = KartuMagangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
