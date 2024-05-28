<?php

namespace App\Filament\Shipping\Resources\ConsigneeResource\Pages;

use App\Filament\Shipping\Resources\ConsigneeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsignee extends EditRecord
{
    protected static string $resource = ConsigneeResource::class;

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
