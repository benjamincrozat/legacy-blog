<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\CategoryResource\Pages;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\MarkdownEditor::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('long_description')
                            ->maxLength(65535)
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('content')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan([
                        'md' => 1,
                        'lg' => 2,
                    ])
                    ->collapsible(),

                Forms\Components\Section::make('Colors')
                    ->schema([
                        Forms\Components\TextInput::make('primary_color')
                            ->label('Primary')
                            ->maxLength(255),

                        Forms\Components\TextInput::make('secondary_color')
                            ->label('Secondary')
                            ->maxLength(255),
                    ])
                    ->collapsible()
                    ->columnSpan([
                        'lg' => 1,
                    ]),
            ])
            ->columns([
                'md' => 1,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table) : Table
    {
        return $table
            ->columns([
                Tables\Columns\Layout\Split::make([
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('name')
                            ->searchable()
                            ->sortable()
                            ->weight('medium'),

                        Tables\Columns\TextColumn::make('slug')
                            ->searchable()
                            ->sortable()
                            ->color('gray'),
                    ]),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('primary_color')
                            ->searchable(),

                        Tables\Columns\TextColumn::make('secondary_color')
                            ->searchable(),
                    ]),
                ]),
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

    public static function getGloballySearchableAttributes() : array
    {
        return ['name', 'slug', 'description', 'long_description', 'content', 'primary_color', 'secondary_color'];
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
