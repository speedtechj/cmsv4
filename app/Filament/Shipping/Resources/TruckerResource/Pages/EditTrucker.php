<?php

namespace App\Filament\Shipping\Resources\TruckerResource\Pages;

use App\Filament\Shipping\Resources\TruckerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrucker extends EditRecord
{
    protected static string $resource = TruckerResource::class;
   
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
