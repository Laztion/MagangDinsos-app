<?php

namespace App\Filament\Resources\LampiranLaporans\Pages;

use App\Filament\Resources\LampiranLaporans\LampiranLaporanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLampiranLaporans extends ListRecords
{
    protected static string $resource = LampiranLaporanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
