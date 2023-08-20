<?php

namespace App\Filament\Resources\PostResource\Pages;

use Filament\Actions;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions() : array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs() : array
    {
        return [
            null => ListRecords\Tab::make('All'),
            'Published' => ListRecords\Tab::make()
                ->query(fn (Builder $query) => $query->where('is_published', true)),
            'Draft' => ListRecords\Tab::make()
                ->query(fn (Builder $query) => $query->where('is_published', false)),
        ];
    }
}
