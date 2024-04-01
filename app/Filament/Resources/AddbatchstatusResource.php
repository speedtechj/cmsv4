<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Batch;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Provincephil;
use App\Models\Addbatchstatus;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AddbatchstatusResource\Pages;
use App\Filament\Resources\AddbatchstatusResource\RelationManagers;

class AddbatchstatusResource extends Resource
{
    protected static ?string $model = Addbatchstatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('batch.batchno')
                ->label('Batch Number')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('booking_invoice')
                ->label('Invoice')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('manual_invoice')
                ->label('Manual Invoice')
                ->searchable()
                ->sortable(),
                TagsColumn::make('invoicestatus.trackstatus.description'),
            Tables\Columns\TextColumn::make('boxtype.description')
                ->label('Box Type')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('sender.full_name')
                ->label('Sender Name')
                ->searchable()
                ->sortable(),
            // ->url(fn (Booking $record) => route('filament.resources.senders.edit', $record->sender)),
            Tables\Columns\TextColumn::make('receiver.full_name')
                ->label('Receiver')
                ->searchable()
                ->sortable(),
            // ->url(fn (Booking $record) => route('filament.resources.receivers.edit', $record->receiver)),
            Tables\Columns\TextColumn::make('receiveraddress.provincephil.name')
                ->label('Province')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('receiveraddress.cityphil.name')
                ->label('City')
                ->searchable()
                ->sortable(),
            ])
            ->filters([
                SelectFilter::make('batch_id')
                ->multiple()
                ->options(Batch::all()->where('is_active', true)->pluck('batchno', 'id'))
                ->label('Batch Number')
                ->default(array('Select Batch Number')),
                
            ], layout: FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAddbatchstatuses::route('/'),
            'create' => Pages\CreateAddbatchstatus::route('/create'),
            'edit' => Pages\EditAddbatchstatus::route('/{record}/edit'),
        ];
    }

    
}
