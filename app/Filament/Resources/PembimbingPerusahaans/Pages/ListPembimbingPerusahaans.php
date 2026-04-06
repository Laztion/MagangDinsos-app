<?php

namespace App\Filament\Resources\PembimbingPerusahaans\Pages;

use App\Filament\Resources\PembimbingPerusahaans\PembimbingPerusahaanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPembimbingPerusahaans extends ListRecords
{
    protected static string $resource = PembimbingPerusahaanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
