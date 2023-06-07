<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FireMitigationActivitiesResource\Pages;
use App\Filament\Resources\FireMitigationActivitiesResource\RelationManagers;
use App\Models\FireMitigationActivities;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FireMitigationActivitiesResource extends Resource
{
    protected static ?string $model = FireMitigationActivities::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Select::make('location_id')->relationship('location', 'name'),
                    Forms\Components\TextInput::make('type'),
                    // Forms\Components\TextInput::make('duration'),
                    Forms\Components\TextInput::make('description'), 
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('location.name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('type')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('duration'),
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
            'index' => Pages\ListFireMitigationActivities::route('/'),
            'create' => Pages\CreateFireMitigationActivities::route('/create'),
            'edit' => Pages\EditFireMitigationActivities::route('/{record}/edit'),
        ];
    }    
}
