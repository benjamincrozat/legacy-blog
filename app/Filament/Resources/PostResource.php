<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers\CategoriesRelationManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Forms\Components\MarkdownEditor::make('content')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('teaser')
                            ->maxLength(65535)
                            ->columnSpanFull()
                            ->helperText('An overview of the article used in the feed with the intent to entice readers to click through.'),
                    ])
                    ->collapsible()
                    ->columnSpan([
                        'md' => 1,
                        'lg' => 2,
                    ]),

                Forms\Components\Section::make('Metadata')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required()
                            ->searchable()
                            ->default(auth()->id()),

                        Forms\Components\TextInput::make('image')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->rows(5)
                            ->helperText('A short description used on the blog, social previews, and Google.'),

                        Forms\Components\TextInput::make('community_link')
                            ->url()
                            ->maxLength(255)
                            ->helperText("When filled, the article will have a distinct appearance that makes it clear it's shared content."),

                        Forms\Components\Toggle::make('commercial')
                            ->label('Is a commercial article')
                            ->helperText('If checked, the UI will focus on conversion.'),

                        Forms\Components\Toggle::make('is_published')
                            ->label('Is published')
                            ->helperText('When unchecked, the article is considered as a draft.'),

                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->label('Created at')
                                    ->content(fn (Post $record) : ?string => $record->created_at?->isoFormat('LLL')),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->label('Last modified at')
                                    ->content(fn (Post $record) : ?string => $record->updated_at?->isoFormat('LLL')),
                            ])
                            ->hidden(fn (?Post $record) => null === $record),
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
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->label('ID')
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),

                ViewColumn::make('')
                    ->view('filament.tables.columns.post-overview')
                    ->searchable(['title', 'slug']),

                Tables\Columns\TextColumn::make('Status')
                    ->badge()
                    ->getStateUsing(fn (Post $record) : string => $record->is_published ? 'Published' : 'Draft')
                    ->colors([
                        'success' => 'Published',
                    ]),
            ])
            ->filters([
                Filter::make('Commercial')
                    ->query(fn (Builder $query) : Builder => $query->where('commercial', true))
                    ->toggle(),
                Filter::make('Community Link')
                    ->query(fn (Builder $query) : Builder => $query->whereNotNull('community_link'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->button()->outlined()->icon(''),
                Tables\Actions\DeleteAction::make()->link()->icon(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getGloballySearchableAttributes() : array
    {
        return ['title', 'slug', 'user.name', 'content', 'description', 'teaser'];
    }

    public static function getGlobalSearchResultDetails(Model $record) : array
    {
        return [
            'Author' => $record->user->name,
        ];
    }

    public static function getRelations() : array
    {
        return [
            CategoriesRelationManager::class,
        ];
    }

    public static function getPages() : array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}