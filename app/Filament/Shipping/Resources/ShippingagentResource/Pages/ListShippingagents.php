<?php

namespace App\Filament\Shipping\Resources\ShippingagentResource\Pages;

use App\Filament\Shipping\Resources\ShippingagentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListShippingagents extends ListRecords
{
    protected static string $resource = ShippingagentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
