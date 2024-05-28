<?php

namespace App\Filament\Shipping\Resources\ShippingbookingResource\Widgets;

use App\Models\Shippingbooking;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ShippingbookingOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
        Stat::make('Completed', Shippingbooking::where('is_complete', true)->count()),
        Stat::make('Incomplete', Shippingbooking::where('is_complete', false)->count()),
        ];
    }
}
