<?php

namespace App\Filament\Resources\SyaratDanKetentuanResource\Pages;

use App\Filament\Resources\SyaratDanKetentuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSyaratDanKetentuans extends ListRecords
{
    protected static string $resource = SyaratDanKetentuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
