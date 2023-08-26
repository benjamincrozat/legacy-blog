<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Jobs\GeneratePostTeaser;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use App\Jobs\GeneratePostDescription;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers\CategoryRelationManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $recordTitleAttribute = 'title';

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
            ->filters([
                SelectFilter::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple(),

                Filter::make('Commercial')
                    ->query(fn (Builder $query) : Builder => $query->where('commercial', true))
                    ->toggle(),

                Filter::make('Community Link')
                    ->query(fn (Builder $query) : Builder => $query->whereNotNull('community_link'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    static::getGenerateDescriptionAction(),
                    static::getGenerateTeaserAction(),
                ]),
                Tables\Actions\EditAction::make()->button()->outlined()->icon(''),
                Tables\Actions\DeleteAction::make()->icon(''),
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

    public static function getFormComponents() : array
    {
        return [
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
        ];
    }

    public static function getTableColumns() : array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->numeric()
                ->label('ID')
                ->sortable()
                ->weight('bold'),

            Tables\Columns\TextColumn::make('user.name')
                ->label('Author')
                ->searchable()
                ->sortable(),

            Tables\Columns\ImageColumn::make('image')
                ->circular()
                ->label(''),

            Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->searchable()
                ->description(fn (Post $record) : string => $record->slug),

            Tables\Columns\TextColumn::make('Status')
                ->badge()
                ->getStateUsing(fn (Post $record) : string => $record->is_published ? 'Published' : 'Draft')
                ->colors([
                    'success' => 'Published',
                ]),
        ];
    }

    public static function getGenerateDescriptionAction() : Action
    {
        return Action::make('Generate description')
            ->form([
                Forms\Components\Select::make('model')
                    ->options([
                        'gpt-4' => 'GPT-4',
                        'gpt-3.5-turbo-16k' => 'GPT-3.5 Turbo 16K',
                        'gpt-3.5-turbo' => 'GPT-3.5 Turbo',
                    ])
                    ->default('gpt-3.5-turbo')
                    ->required(),
            ])
            ->action(function (Post $post, array $data) {
                GeneratePostDescription::dispatch($post, $data['model']);

                Notification::make()
                    ->title("Description for \"$post->title\" is generating!")
                    ->success()
                    ->send();
            });
    }

    public static function getGenerateTeaserAction() : Action
    {
        return Action::make('Generate teaser')
            ->form([
                Forms\Components\Select::make('model')
                    ->options([
                        'gpt-4' => 'GPT-4',
                        'gpt-3.5-turbo-16k' => 'GPT-3.5 Turbo 16K',
                        'gpt-3.5-turbo' => 'GPT-3.5 Turbo',
                    ])
                    ->default('gpt-3.5-turbo')
                    ->required(),
            ])
            ->action(function (Post $post, array $data) {
                GeneratePostTeaser::dispatch($post, $data['model']);

                Notification::make()
                    ->title("Teaser for \"$post->title\" is generating!")
                    ->success()
                    ->send();
            });
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
            CategoryRelationManager::class,
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
