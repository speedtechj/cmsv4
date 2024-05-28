<?php

namespace App\Filament\Shipping\Resources\ShippingbookingResource\Pages;

use App\Filament\Shipping\Resources\ShippingbookingResource;
use App\Filament\Shipping\Resources\ShippingbookingResource\Widgets\ShippingbookingOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippingbookings extends ListRecords
{
    protected static string $resource = ShippingbookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            ShippingbookingOverview::class,
        ];
    }
}
