<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Contracts\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\RelationManagers\PostRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\RelatedRelationManager;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema(static::getFormComponents())
            ->columns([
                'md' => 1,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table) : Table
    {
        return $table
            ->columns(static::getTableColumns())
            ->modifyQueryUsing(fn (Builder $query) => $query->withCount(['posts']))
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button()->outlined()->icon(''),
                Tables\Actions\DeleteAction::make()->link()->icon(''),
                static::getCacheAction(),
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

    public static function getFormComponents() : array
    {
        return [
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
        ];
    }

    public static function getTableColumns() : array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('slug')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('primary_color')
                ->searchable(),

            Tables\Columns\TextColumn::make('secondary_color')
                ->searchable(),

            Tables\Columns\TextColumn::make('posts_count')
                ->counts('posts')
                ->sortable(),

            Tables\Columns\TextColumn::make('cached')
                ->badge()
                ->getStateUsing(
                    function (Category $category) : string {
                        $cached = cache()->has("Category.$category->id.long_description." . sha1($category->long_description)) &&
                                  cache()->has("Category.$category->id.content." . sha1($category->content));

                        return $cached ? 'Cached' : 'Not cached';
                    }
                )
                ->colors([
                    'success' => 'Cached',
                    'danger' => 'Not cached',
                ]),
        ];
    }

    public static function getCacheAction() : Action
    {
        return Action::make('Cache')
            ->action(fn (Post $post) => CacheRenderedPostAttributes::dispatch($post))
            ->requiresConfirmation();
    }

    public static function getGloballySearchableAttributes() : array
    {
        return ['name', 'slug', 'description', 'long_description', 'content', 'primary_color', 'secondary_color'];
    }

    public static function getRelations() : array
    {
        return [
            PostRelationManager::class,
            RelatedRelationManager::class,
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
