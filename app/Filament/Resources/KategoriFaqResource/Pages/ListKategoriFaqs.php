<?php

namespace App\Filament\Resources\KategoriFaqResource\Pages;

use App\Filament\Resources\KategoriFaqResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKategoriFaqs extends ListRecords
{
    protected static string $resource = KategoriFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
