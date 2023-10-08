<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'Others';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Forms\Components\MarkdownEditor::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('github_handle')
                            ->maxLength(255)
                            ->label('GitHub'),

                        Forms\Components\TextInput::make('x_handle')
                            ->maxLength(255)
                            ->label('X'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Credentials')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn (string $state) : string => Hash::make($state))
                            ->dehydrated(fn (?string $state) : bool => filled($state))
                            ->required(fn (string $operation) : bool => 'create' === $operation),
                    ])
                    ->columns(2),
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

                        Tables\Columns\TextColumn::make('email')
                            ->searchable()
                            ->sortable()
                            ->copyable()
                            ->color('gray'),
                    ]),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('github_handle')
                            ->searchable()
                            ->copyable()
                            ->icon('icon-github')
                            ->label('GitHub'),

                        Tables\Columns\TextColumn::make('x_handle')
                            ->searchable()
                            ->copyable()
                            ->icon('icon-x')
                            ->label('X'),
                    ])
                        ->space(2),
                ]),
            ])
            ->filters([
                //
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
        return ['name', 'email', 'description', 'github_handle', 'x_handle'];
    }

    public static function getGlobalSearchResultDetails(Model $record) : array
    {
        return [
            'Email' => $record->email,
            'GitHub' => $record->github_handle,
            'X' => $record->x_handle,
        ];
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
