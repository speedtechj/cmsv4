<?php

namespace App\Filament\Twelve24\Resources;

use App\Filament\Twelve24\Resources\RemarkstatusResource\Pages;
use App\Filament\Twelve24\Resources\RemarkstatusResource\RelationManagers;
use App\Models\Remarkstatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RemarkstatusResource extends Resource
{
    protected static ?string $model = Remarkstatus::class;

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
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRemarkstatuses::route('/'),
            'create' => Pages\CreateRemarkstatus::route('/create'),
            'edit' => Pages\EditRemarkstatus::route('/{record}/edit'),
        ];
    }
}
