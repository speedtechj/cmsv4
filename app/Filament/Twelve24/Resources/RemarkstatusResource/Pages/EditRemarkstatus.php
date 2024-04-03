<?php

namespace App\Filament\Twelve24\Resources\RemarkstatusResource\Pages;

use App\Filament\Twelve24\Resources\RemarkstatusResource;
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
