<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel = 'Payment';

    protected static ?string $modelLabel = 'Payment';

    protected static ?string $navigationGroup = 'Customer Billing';

    protected static ?string $slug = 'payment';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('payment_date')
                    ->required(),
                Forms\Components\TextInput::make('pay_month')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('admin_fee')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('total_payment')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('users_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('bills_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('payment_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pay_month')
                    ->searchable(),
                Tables\Columns\TextColumn::make('admin_fee')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_payment')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bills_id')
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'view' => Pages\ViewPayment::route('/{record}'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
