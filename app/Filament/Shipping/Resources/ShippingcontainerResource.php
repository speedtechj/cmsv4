<?php

namespace App\Filament\Shipping\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Skidweight;
use Filament\Tables\Table;
use App\Models\Skiddinginfo;
use Filament\Resources\Resource;
use App\Models\Shippingcontainer;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Shipping\Resources\ShippingcontainerResource\Pages;
use App\Filament\Shipping\Resources\ShippingcontainerResource\RelationManagers;

class ShippingcontainerResource extends Resource
{
    protected static ?string $model = Shippingcontainer::class;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('Container Information')
                            ->schema([
                                Forms\Components\Select::make('trucker_id')
                                    ->relationship('trucker', 'name')
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Select::make('shippingbooking_id')
                                    ->relationship('shippingbooking', 'booking_no')
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Select::make('batch_id')
                                    ->live()
                                    ->native(false)
                                    ->relationship(
                                        'batch',
                                        'batchno',
                                        modifyQueryUsing: fn(Builder $query) => $query->where('is_lock', false)
                                    )
                                    ->required()
                                    ->afterStateUpdated(function (Set $set, $state) {
                                        $set('total_box', Skiddinginfo::where('batch_id', $state)->count());
                                        $set('total_cbm', Skiddinginfo::where('batch_id', $state)->sum('cbm'));
                                        $set('cargo_weight', Skidweight::where('batch_id', $state)->sum('weight'));

                                    }),
                                Forms\Components\TextInput::make('container_no')
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('equipment_id')
                                    ->relationship('equipment', 'code')
                                    ->required()
                                    ->native(false),
                                Forms\Components\TextInput::make('seal_no')
                                    ->unique(ignoreRecord: true)
                                    ->required()
                                    ->maxLength(255),

                            ])
                    ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Section::make('Weight / Cbm Information')
                            ->schema([
                                Forms\Components\TextInput::make('tare_weight')
                                    ->suffix('lbs')
                                    ->required()
                                    ->numeric(),
                                   
                                Forms\Components\TextInput::make('cargo_weight')
                                    ->suffix('lbs')
                                    ->required()
                                    ->numeric(),
                                  
                                Forms\Components\TextInput::make('total_box')
                                    ->suffix('Boxes')
                                    ->required()
                                    ->numeric(),
                                    
                                Forms\Components\TextInput::make('total_cbm')
                                    ->suffix('cbm')
                                    ->required()
                                    ->numeric()
                                    
                            ]),

                    ])->columnSpan(['lg' => 1]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('trucker.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('shippingbooking.booking_no')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('batch.batchno')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('container_no')
                    ->searchable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('equipment.code')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('seal_no')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tare_weight')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cargo_weight')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_box')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_cbm')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.full_name')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListShippingcontainers::route('/'),
            'create' => Pages\CreateShippingcontainer::route('/create'),
            'edit' => Pages\EditShippingcontainer::route('/{record}/edit'),
        ];
    }
}
