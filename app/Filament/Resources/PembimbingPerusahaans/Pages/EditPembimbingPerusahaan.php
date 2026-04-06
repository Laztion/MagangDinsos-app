<?php

namespace App\Filament\Resources\PembimbingPerusahaans\Pages;

use App\Filament\Resources\PembimbingPerusahaans\PembimbingPerusahaanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPembimbingPerusahaan extends EditRecord
{
    protected static string $resource = PembimbingPerusahaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
