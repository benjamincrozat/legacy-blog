<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Merchant;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\MerchantResource\Pages;

class MerchantResource extends Resource
{
    protected static ?string $model = Merchant::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('icon')
                    ->maxLength(255),

                Forms\Components\TextInput::make('screenshot')
                    ->maxLength(255),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('take')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->default(0),

                Forms\Components\Textarea::make('pricing')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('annual_discount')
                    ->maxLength(255),

                Forms\Components\TextInput::make('guarantee')
                    ->maxLength(255),

                Forms\Components\Textarea::make('content')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('key_features')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('pros')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('cons')
                    ->maxLength(65535)
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('highlight_title')
                    ->maxLength(255),

                Forms\Components\Textarea::make('highlight_text')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table) : Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations() : array
    {
        return [
            //
        ];
    }

    public static function getPages() : array
    {
        return [
            'index' => Pages\ListMerchants::route('/'),
            'create' => Pages\CreateMerchant::route('/create'),
            'edit' => Pages\EditMerchant::route('/{record}/edit'),
        ];
    }
}
