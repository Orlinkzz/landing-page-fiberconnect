<?php

namespace App\Filament\Resources\PromoResource\Widgets;

use App\Models\Promo;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PromoStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Promo', Promo::count())
                ->description('Total promo seluruhnya')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Promo aktif', Promo::where('tanggal_selesai', '>', now())->count())
                ->description('Total promo aktif')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Promo non-aktif', Promo::where('tanggal_selesai', '<', now())->count())
                ->description('Total promo non-aktif')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
        ];
    }
}
