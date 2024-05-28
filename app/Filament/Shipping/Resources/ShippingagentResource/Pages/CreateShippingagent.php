<?php

namespace App\Filament\Shipping\Resources\ShippingagentResource\Pages;

use App\Filament\Shipping\Resources\ShippingagentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShippingagent extends CreateRecord
{
    protected static bool $canCreateAnother = false;
    protected static string $resource = ShippingagentResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
