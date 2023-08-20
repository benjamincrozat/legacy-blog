<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\PostResource;
use Filament\Resources\RelationManagers\RelationManager;

class PostsRelationManager extends RelationManager
{
    protected static string $relationship = 'posts';

    public function form(Form $form) : Form
    {
        return $form
            ->schema(PostResource::getFormComponents())
            ->columns(1);
    }

    public function table(Table $table) : Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns(PostResource::getTableColumns())
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
            ]);
    }
}
