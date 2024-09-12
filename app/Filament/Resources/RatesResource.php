<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RatesResource\Pages;
use App\Filament\Resources\RatesResource\RelationManagers;
use App\Models\Rates;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RatesResource extends Resource
{
    protected static ?string $model = Rates::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationLabel = 'Rates';

    protected static ?string $modelLabel = 'Rates';

    protected static ?string $navigationGroup = 'Rate Settings';

    protected static ?string $slug = 'rates';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Rates power per kwh')
                    ->description('Make rates power per kwh')
                    ->schema([
                    Forms\Components\TextInput::make('power')
                        ->required()
                        ->maxLength(45),
                    Forms\Components\TextInput::make('rateperkwh')
                        ->required()
                        ->maxLength(100),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('power')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rateperkwh')
                    ->searchable(),
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
            'index' => Pages\ListRates::route('/'),
            'create' => Pages\CreateRates::route('/create'),
            'edit' => Pages\EditRates::route('/{record}/edit'),
        ];
    }
}
