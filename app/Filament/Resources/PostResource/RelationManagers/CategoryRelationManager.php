<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Filament\Resources\CategoryResource;
use Filament\Resources\RelationManagers\RelationManager;

class CategoryRelationManager extends RelationManager
{
    protected static string $relationship = 'categories';

    public function form(Form $form) : Form
    {
        return $form
            ->schema(CategoryResource::getFormComponents());
    }

    public function table(Table $table) : Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns(CategoryResource::getTableColumns())
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->icon(''),
                Tables\Actions\DetachAction::make()->icon(''),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make(),
            ]);
    }
}
