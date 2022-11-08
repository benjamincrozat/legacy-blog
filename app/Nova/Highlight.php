<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Highlight extends Resource
{
    public static $group = 'Blog';

    public static $model = \App\Models\Highlight::class;

    public static $title = 'post.title';

    public static $search = [
        'id', 'post.title',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Post')
                ->searchable(),

            DateTime::make('Created At')
                ->displayUsing(fn () => $this->created_at->isoFormat('lll'))
                ->exceptOnForms(),
        ];
    }

    public function cards(NovaRequest $request) : array
    {
        return [];
    }

    public function filters(NovaRequest $request) : array
    {
        return [];
    }

    public function lenses(NovaRequest $request) : array
    {
        return [];
    }

    public function actions(NovaRequest $request) : array
    {
        return [];
    }
}
