<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FireIncidentResource\Pages;
use App\Filament\Resources\FireIncidentResource\RelationManagers;
use App\Models\FireIncident;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FireIncidentResource extends Resource
{
    protected static ?string $model = FireIncident::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    // Forms\Components\TextInput::make('id'),
                    Forms\Components\Select::make('location_id')->relationship('location', 'name'),
                    // Forms\Components\TextInput::make('date_time'),
                    Forms\Components\TextInput::make('cause'),
                    Forms\Components\TextInput::make('severity'),
                    Forms\Components\TextInput::make('description'), 
                ])
                    
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    // Tables\Columns\TextColumn::make('id')->sortable(),
                    // Tables\Columns\TextColumn::make('location_id'),
                    Tables\Columns\TextColumn::make('location.name')->sortable(),
                    Tables\Columns\TextColumn::make('cause')->sortable()->searchable(),
                    Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListFireIncidents::route('/'),
            'create' => Pages\CreateFireIncident::route('/create'),
            'edit' => Pages\EditFireIncident::route('/{record}/edit'),
        ];
    }    
}
