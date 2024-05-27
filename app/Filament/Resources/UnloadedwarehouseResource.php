<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Batch;
use App\Models\Manifest;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\Unloadedwarehouse;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UnloadedwarehouseResource\Pages;
use App\Filament\Resources\UnloadedwarehouseResource\RelationManagers;

class UnloadedwarehouseResource extends Resource
{
    protected static ?string $model = Unloadedwarehouse::class;

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
                Tables\Columns\TextColumn::make('booking.booking_invoice')
                    ->label('Generated Invoice'),
                Tables\Columns\TextColumn::make('booking.manual_invoice')
                ->label('Manual Invoice'),
                Tables\Columns\TextColumn::make('batch.batchno')
                ->label('Manual Invoice'),
                Tables\Columns\TextColumn::make('trackstatus.description')
                ->label('Status'),
                Tables\Columns\IconColumn::make('match')
                ->boolean()
                ->getStateUsing(function (Model $record): bool {
                    $compresult = Manifest::where(['id' => $record->booking_id,'batch_id' => $record->batch_id])
                    ->exists();
                    return $compresult;
                    
                 }),

            ])
            ->filters([
                SelectFilter::make('batch_id')
                ->multiple()
                ->label('Batch Number')
                ->options(Batch::Batchmanifest())
                // ->relationship('batch', 'batchno', fn (Builder $query) => $query->where('is_active', '1'))
                ->default(array('Select Batch Number')),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUnloadedwarehouses::route('/'),
            'create' => Pages\CreateUnloadedwarehouse::route('/create'),
            // 'edit' => Pages\EditUnloadedwarehouse::route('/{record}/edit'),
        ];
    }
}
