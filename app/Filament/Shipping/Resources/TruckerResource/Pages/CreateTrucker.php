<?php

namespace App\Filament\Shipping\Resources\TruckerResource\Pages;

use App\Filament\Shipping\Resources\TruckerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTrucker extends CreateRecord
{
    protected static string $resource = TruckerResource::class;
    protected static bool $canCreateAnother = false;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
