<?php

namespace App\Filament\Shipping\Resources\ShippingbookingResource\Pages;

use App\Filament\Shipping\Resources\ShippingbookingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateShippingbooking extends CreateRecord
{
    protected static string $resource = ShippingbookingResource::class;
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
