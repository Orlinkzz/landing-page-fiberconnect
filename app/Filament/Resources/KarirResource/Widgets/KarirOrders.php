<?php

namespace App\Filament\Resources\KarirResource\Widgets;

use App\Models\Karir;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class KarirOrders extends BaseWidget
{
    // Full column widget table
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Karir::query()
                ->orderByRaw('closing_date IS NULL DESC')
                ->orderBy('closing_date', 'asc')
                ->latest()
                ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable(),
                Tables\Columns\TextColumn::make('closing_date')
                    ->since()
                    ->dateTimeTooltip()
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('perusahaan.name')
                    ->limit(30)
                    ->sortable(),
            ]);
    }
}
