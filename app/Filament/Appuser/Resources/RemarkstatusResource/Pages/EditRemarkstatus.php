<?php

namespace App\Filament\Appuser\Resources\RemarkstatusResource\Pages;

use App\Filament\Appuser\Resources\RemarkstatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRemarkstatus extends EditRecord
{
    protected static string $resource = RemarkstatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
