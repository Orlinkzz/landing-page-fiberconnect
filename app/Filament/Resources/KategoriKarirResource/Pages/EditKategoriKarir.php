<?php

namespace App\Filament\Resources\KategoriKarirResource\Pages;

use App\Filament\Resources\KategoriKarirResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriKarir extends EditRecord
{
    protected static string $resource = KategoriKarirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
