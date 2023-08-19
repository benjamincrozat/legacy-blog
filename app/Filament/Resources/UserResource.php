<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\MarkdownEditor::make('description')
                    ->maxLength(65535),

                Forms\Components\TextInput::make('github_handle')
                    ->maxLength(255)
                    ->label('GitHub'),

                Forms\Components\TextInput::make('x_handle')
                    ->maxLength(255)
                    ->label('X'),

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
            ->columns(1);
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
                            ->color('gray'),
                    ]),

                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('github_handle')
                            ->icon('icon-github')
                            ->label('GitHub'),

                        Tables\Columns\TextColumn::make('x_handle')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
