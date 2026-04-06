<?php

namespace App\Filament\Resources\PembimbingUniversitas\Pages;

use App\Filament\Resources\PembimbingUniversitas\PembimbingUniversitasResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPembimbingUniversitas extends ListRecords
{
    protected static string $resource = PembimbingUniversitasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
