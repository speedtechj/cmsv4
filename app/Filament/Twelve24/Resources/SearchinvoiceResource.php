<?php

namespace App\Filament\Twelve24\Resources;

use App\Filament\Appuser\Resources\SearchinvoiceResource\RelationManagers\InvattachRelationManager;
use App\Filament\Appuser\Resources\SearchinvoiceResource\RelationManagers\InvoicestatusRelationManager;
use App\Filament\Twelve24\Resources\SearchinvoiceResource\Pages;
use App\Filament\Twelve24\Resources\SearchinvoiceResource\RelationManagers;
use App\Filament\Twelve24\Resources\SearchinvoiceResource\RelationManagers\RemarkstatusRelationManager;
use App\Models\Searchinvoice;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SearchinvoiceResource extends Resource
{
    protected static ?string $model = Searchinvoice::class;

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
                Tables\Columns\TextColumn::make('booking_invoice')
                ->label('Generated Invoice')
                ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('manual_invoice')
                ->label('Manual Invoice')
                ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('sender.full_name')
                ->label('Sender Name')
                ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('sender.mobile_no')
                ->label('Sender Number')
                ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('receiver.full_name')
                ->label('Receiver Name')
                ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('receiver.mobile_no')
                ->label('Receiver Number')
                ->searchable(isIndividual: true, isGlobal: false),
            ])
            ->filters([
                //
            ])
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
            InvoicestatusRelationManager::class,
            RemarkstatusRelationManager::class,
            InvattachRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSearchinvoices::route('/'),
            'create' => Pages\CreateSearchinvoice::route('/create'),
            'edit' => Pages\EditSearchinvoice::route('/{record}/edit'),
        ];
    }
}
