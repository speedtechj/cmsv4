<?php

namespace App\Filament\Shipping\Resources\CarrierResource\Pages;

use App\Filament\Shipping\Resources\CarrierResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCarrier extends CreateRecord
{
    protected static string $resource = CarrierResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
