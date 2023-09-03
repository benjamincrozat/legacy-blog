<?php

namespace App\Filament\Resources;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use App\Filament\Resources\UserResource\Pages;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-list-bullet';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form) : Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table) : Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('log_name')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subject_type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('event')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('subject_id')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('causer_type')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('causer_id')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getGloballySearchableAttributes() : array
    {
        return [];
    }

    public static function getGlobalSearchResultDetails(Model $record) : array
    {
        return [];
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
            'index' => Pages\ListActivities::route('/'),
        ];
    }
}
