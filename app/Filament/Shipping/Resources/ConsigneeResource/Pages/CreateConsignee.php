<?php

namespace App\Filament\Shipping\Resources\ConsigneeResource\Pages;

use App\Filament\Shipping\Resources\ConsigneeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateConsignee extends CreateRecord
{
    protected static string $resource = ConsigneeResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
