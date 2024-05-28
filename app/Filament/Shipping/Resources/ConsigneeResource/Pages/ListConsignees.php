<?php

namespace App\Filament\Shipping\Resources\ConsigneeResource\Pages;

use App\Filament\Shipping\Resources\ConsigneeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsignees extends ListRecords
{
    protected static string $resource = ConsigneeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
