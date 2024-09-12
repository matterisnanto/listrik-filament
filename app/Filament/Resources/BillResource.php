<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BillResource\Pages;
use App\Filament\Resources\BillResource\RelationManagers;
use App\Models\Bill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BillResource extends Resource
{
    protected static ?string $model = Bill::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-currency-dollar';

    protected static ?string $navigationLabel = 'Bills';

    protected static ?string $modelLabel = 'Billing';

    protected static ?string $navigationGroup = 'Customer Billing';

    protected static ?string $slug = 'bill';

    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('usages_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('month')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('number_of_meters')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('customers_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('usages_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('month')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_meters')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customers_id')
                    ->numeric()
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListBills::route('/'),
            'create' => Pages\CreateBill::route('/create'),
            'view' => Pages\ViewBill::route('/{record}'),
            'edit' => Pages\EditBill::route('/{record}/edit'),
        ];
    }
}
