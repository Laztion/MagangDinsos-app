<?php

namespace App\Filament\Resources\PembimbingUniversitas\Pages;

use App\Filament\Resources\PembimbingUniversitas\PembimbingUniversitasResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPembimbingUniversitas extends EditRecord
{
    protected static string $resource = PembimbingUniversitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
