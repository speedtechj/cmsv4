<?php

namespace App\Filament\Resources\UnloadedwarehouseResource\Pages;

use App\Filament\Resources\UnloadedwarehouseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUnloadedwarehouse extends EditRecord
{
    protected static string $resource = UnloadedwarehouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
