<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Opening;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\OpeningResource\Pages;

class OpeningResource extends Resource
{
    protected static ?string $model = Opening::class;

    protected static ?string $navigationGroup = 'Others';

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

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
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Opening::class, 'slug', ignoreRecord: true),

                    Forms\Components\MarkdownEditor::make('description')
                        ->required()
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
                    Forms\Components\TextInput::make('company')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('minimum_salary')
                        ->numeric(),

                    Forms\Components\TextInput::make('maximum_salary')
                        ->numeric(),

                    Forms\Components\Select::make('remote_status')
                        ->options([
                            'full' => 'Full',
                            'partial' => 'Partial',
                            'on_site' => 'On-site',
                        ])
                        ->default('full'),

                    Forms\Components\TextInput::make('location')
                        ->maxLength(255),

                    Forms\Components\Group::make()
                        ->schema([
                            Forms\Components\Placeholder::make('created_at')
                                ->label('Created at')
                                ->content(fn (Opening $opening) : ?string => $opening->created_at?->isoFormat('LLL')),

                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn (Opening $opening) : ?string => $opening->updated_at?->isoFormat('LLL')),
                        ])
                        ->hidden(fn (?Opening $opening) => null === $opening),
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

            Tables\Columns\TextColumn::make('title')
                ->sortable()
                ->searchable()
                ->description(fn (Opening $opening) => $opening->slug),
        ];
    }

    public static function getPages() : array
    {
        return [
            'index' => Pages\ListOpenings::route('/'),
            'create' => Pages\CreateOpening::route('/create'),
            'edit' => Pages\EditOpening::route('/{record}/edit'),
        ];
    }
}
