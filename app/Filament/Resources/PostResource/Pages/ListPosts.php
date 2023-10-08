<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

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
            'Published' => Tab::make()
                ->query(fn (Builder $query) => $query->published()),
            'Draft' => \Filament\Resources\Components\Tab::make()
                ->query(fn (Builder $query) => $query->unpublished()),
        ];
    }

    protected function applySearchToTableQuery(Builder $query) : Builder
    {
        $this->applyColumnSearchesToTableQuery($query);

        if (! empty($search = $this->getTableSearch())) {
            $query->whereIn('id', Post::search($search)->keys());
        }

        return $query;
    }
}
