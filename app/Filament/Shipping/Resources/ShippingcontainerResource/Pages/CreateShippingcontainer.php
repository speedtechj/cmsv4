<?php

namespace App\Filament\Shipping\Resources\ShippingcontainerResource\Pages;

use App\Filament\Shipping\Resources\ShippingcontainerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShippingcontainer extends CreateRecord
{
    protected static string $resource = ShippingcontainerResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;

    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
