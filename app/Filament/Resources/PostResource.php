<?php

namespace App\Filament\Resources;

use App\Str;
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
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Filament\Resources\PostResource\RelationManagers\CategoryRelationManager;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationGroup = 'Blog';

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
                    Tables\Actions\ReplicateAction::make()
                        ->excludeAttributes(['slug'])
                        ->beforeReplicaSaved(function (Model $replica) : void {
                            $replica->slug = Str::random(6);
                            $replica->published_at = null;
                        }),
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
            ->defaultSort('published_at', 'desc');
    }

    public static function getFormComponents() : array
    {
        return [
            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\MarkdownEditor::make('content')
                        ->required()
                        ->maxLength(65535)
                        ->columnSpanFull(),

                    Forms\Components\MarkdownEditor::make('teaser')
                        ->maxLength(65535)
                        ->columnSpanFull()
                        ->helperText('An overview of the article used in the feed with the intent to entice readers to click through.'),

                    SpatieMediaLibraryFileUpload::make('images')
                        ->collection('images')
                        ->conversion('medium')
                        ->disk('media-library')
                        ->downloadable()
                        ->imageEditor()
                        ->imageResizeMode('cover')
                        ->multiple()
                        ->visibility('public'),
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

                    SpatieMediaLibraryFileUpload::make('image')
                        ->collection('image')
                        ->conversion('medium')
                        ->disk('media-library')
                        ->downloadable()
                        ->imageCropAspectRatio('16:9')
                        ->imageEditor()
                        ->imageResizeMode('cover')
                        ->imageResizeTargetHeight('1080')
                        ->imageResizeTargetWidth('1920')
                        ->visibility('public'),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Post::class, 'slug', ignoreRecord: true),

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

                    Forms\Components\DateTimePicker::make('published_at')
                        ->timezone('UTC')
                        ->helperText('When not set, the article is considered as a draft.'),

                    Forms\Components\DatePicker::make('manually_updated_at')
                        ->timezone('UTC'),

                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Created at')
                                ->content(fn (Post $post) : ?string => $post->created_at?->isoFormat('LLL')),

                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn (Post $post) : ?string => $post->updated_at?->isoFormat('LLL')),
                        ])
                        ->hidden(fn (?Post $post) => null === $post),
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

            Tables\Columns\SpatieMediaLibraryImageColumn::make('image')
                ->collection('image')
                ->conversion('medium')
                ->disk('media-library')
                ->defaultImageUrl('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMjMgMTIzIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiM1MDQ2RTYiIGQ9Ik0wIDBoMTIzdjEyM0gweiIvPjxwYXRoIGZpbGw9IiNGRkYiIGZpbGwtcnVsZT0ibm9uemVybyIgZD0iTTUyLjkwOTA5MDkgMzBjNi4yNzU5NjMxIDAgMTEuMzYzNjM2NCA1LjAzNjc5NjYgMTEuMzYzNjM2NCAxMS4yNXY1LjYyNWMwIDMuMTA2NjAxNyAyLjU0MzgzNjYgNS42MjUgNS42ODE4MTgyIDUuNjI1aDUuNjgxODE4MUM4MS45MTIzMjY3IDUyLjUgODcgNTcuNTM2Nzk2NiA4NyA2My43NXYyMy42MjVDODcgOTAuNDggODQuNDU0NTQ1NSA5MyA4MS4zMTgxODE4IDkzSDQyLjY4MTgxODJDMzkuNTQ1NDU0NSA5MyAzNyA5MC40OCAzNyA4Ny4zNzV2LTUxLjc1QzM3IDMyLjUyIDM5LjU0MjQyNDIgMzAgNDIuNjgxODE4MiAzMFpNNjIgNzcuMjVINTAuNjM2MzYzNmMtMS4yNTUxOTI2IDAtMi4yNzI3MjcyIDEuMDA3MzU5My0yLjI3MjcyNzIgMi4yNXMxLjAxNzUzNDYgMi4yNSAyLjI3MjcyNzIgMi4yNUg2MmMxLjI1NTE5MjYgMCAyLjI3MjcyNzMtMS4wMDczNTkzIDIuMjcyNzI3My0yLjI1UzYzLjI1NTE5MjYgNzcuMjUgNjIgNzcuMjVabTExLjM2MzYzNjQtOUg1MC42MzYzNjM2Yy0xLjI1NTE5MjYgMC0yLjI3MjcyNzIgMS4wMDczNTkzLTIuMjcyNzI3MiAyLjI1czEuMDE3NTM0NiAyLjI1IDIuMjcyNzI3MiAyLjI1aDIyLjcyNzI3MjhjMS4yNTUxOTI2IDAgMi4yNzI3MjcyLTEuMDA3MzU5MyAyLjI3MjcyNzItMi4yNXMtMS4wMTc1MzQ2LTIuMjUtMi4yNzI3MjcyLTIuMjVaIi8+PHBhdGggZmlsbD0iI0ZGRiIgZmlsbC1ydWxlPSJub256ZXJvIiBkPSJNNjUgMzFjMi40OTI3MjI3IDIuODc0MDgzOSAzLjg2MjY3MTEgNi41NTIyNzIyIDMuODU3Mzg5MSAxMC4zNTY3NDI4djUuNjU0ODkwMWMwIC42MjQyOTk5LjUwNjY3ODEgMS4xMzA5NzggMS4xMzA5NzggMS4xMzA5NzhoNS42NTQ4OTAxQzc5LjQ0NzcyNzggNDguMTM3MzI4OSA4My4xMjU5MTYxIDQ5LjUwNzI3NzMgODYgNTJjLTIuNzAxNDg2Ny0xMC4yNzQ0MTg3LTEwLjcyNTU4MTMtMTguMjk4NTEzMy0yMS0yMVoiLz48L2c+PC9zdmc+')
                ->circular()
                ->label(''),

            Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->searchable()
                ->description(fn (Post $post) => $post->slug),

            Tables\Columns\TextColumn::make('sessions_last_7_days')
                ->sortable()
                ->label('Sessions (7 days)')
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('sessions_last_30_days')
                ->sortable()
                ->label('Sessions (30 days)')
                ->toggleable(isToggledHiddenByDefault: true),
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

    public static function getGlobalSearchResultDetails(Model $post) : array
    {
        return [
            'Author' => $post->user->name,
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
