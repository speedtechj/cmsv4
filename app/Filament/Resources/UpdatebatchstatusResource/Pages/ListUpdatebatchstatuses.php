<?php

namespace App\Filament\Resources\UpdatebatchstatusResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use App\Filament\Resources\UpdatebatchstatusResource;

class ListUpdatebatchstatuses extends ListRecords
{
    protected static string $resource = UpdatebatchstatusResource::class;

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    }
}
