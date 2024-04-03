<?php

namespace App\Filament\Twelve24\Resources\SearchinvoiceResource\Pages;

use App\Filament\Twelve24\Resources\SearchinvoiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSearchinvoices extends ListRecords
{
    protected static string $resource = SearchinvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
