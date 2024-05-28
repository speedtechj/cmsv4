<?php

namespace App\Filament\Shipping\Resources\ShippingcontainerResource\Pages;

use App\Filament\Shipping\Resources\ShippingcontainerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippingcontainers extends ListRecords
{
    protected static string $resource = ShippingcontainerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
