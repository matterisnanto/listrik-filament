<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsageResource\Pages;
use App\Filament\Resources\UsageResource\RelationManagers;
use App\Models\Usage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsageResource extends Resource
{
    protected static ?string $model = Usage::class;

    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $navigationLabel = 'Usage';

    protected static ?string $modelLabel = 'Usage';

    protected static ?string $navigationGroup = 'Customer Management';

    protected static ?string $slug = 'usage';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Usage Information')
                ->description('Make a new usage')
                ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship(name: 'customer', titleAttribute: 'customer_name')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('month')
                    ->options([
                        'Januari' => 'Januari',
                        'Februari' => 'Februari',
                        'Maret' => 'Maret',
                        'April' => 'April',
                        'Mei' => 'Mei',
                        'Juni' => 'Juni',
                        'Juli' => 'Juli',
                        'Agustus' => 'Agustus',
                        'September' => 'September',
                        'Oktober' => 'Oktober',
                        'November' => 'November',
                        'Desember' => 'Desember',
                    ])
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('initial_meter')
                    ->required()
                    ->maxLength(45),
                Forms\Components\TextInput::make('final_meter')
                    ->required()
                    ->maxLength(45),

                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('month'),
                Tables\Columns\TextColumn::make('year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('initial_meter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('final_meter')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_id')
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
            'index' => Pages\ListUsages::route('/'),
            'create' => Pages\CreateUsage::route('/create'),
            'view' => Pages\ViewUsage::route('/{record}'),
            'edit' => Pages\EditUsage::route('/{record}/edit'),
        ];
    }
}
