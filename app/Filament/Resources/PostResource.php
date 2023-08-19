<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ViewColumn;
use App\Filament\Resources\PostResource\Pages;

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

                        Forms\Components\Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('teaser')
                            ->maxLength(65535)
                            ->columnSpanFull(),
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
                            ->required(),

                        Forms\Components\TextInput::make('image')
                            ->url()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('community_link')
                            ->url()
                            ->maxLength(255)
                            ->helperText("When filled, the article will have a distinct appearance that makes it clear it's shared content."),

                        Forms\Components\Toggle::make('promotes_affiliate_links')
                            ->label('Is a commercial article')
                            ->helperText('This article promotes affiliate links. If checked, the UI will focus on conversion.'),

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

                ViewColumn::make('')->view('filament.tables.columns.post-overview'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->defaultSort('id', 'desc')
            ->paginated([50, 100, 'all']);
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
