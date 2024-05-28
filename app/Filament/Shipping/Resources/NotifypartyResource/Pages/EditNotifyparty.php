<?php

namespace App\Filament\Shipping\Resources\NotifypartyResource\Pages;

use App\Filament\Shipping\Resources\NotifypartyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNotifyparty extends EditRecord
{
    protected static string $resource = NotifypartyResource::class;

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
