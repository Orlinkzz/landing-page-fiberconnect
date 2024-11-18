<?php

namespace App\Filament\Resources\KategoriFaqResource\Pages;

use App\Filament\Resources\KategoriFaqResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriFaq extends EditRecord
{
    protected static string $resource = KategoriFaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
