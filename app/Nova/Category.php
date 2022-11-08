<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Category extends Resource
{
    public static $group = 'Blog';

    public static $model = \App\Models\Category::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'slug',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->rules('required', 'max:255')
                ->sortable(),

            Text::make('Slug')
                ->rules('required', 'max:255')
                ->sortable(),

            MorphToMany::make('Banners'),

            MorphToMany::make('Posts'),
        ];
    }

    public function subtitle() : string
    {
        return $this->slug;
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
