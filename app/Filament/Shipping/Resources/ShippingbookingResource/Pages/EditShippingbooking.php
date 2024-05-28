<?php

namespace App\Filament\Shipping\Resources\ShippingbookingResource\Pages;

use App\Filament\Shipping\Resources\ShippingbookingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditShippingbooking extends EditRecord
{
    protected static string $resource = ShippingbookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
