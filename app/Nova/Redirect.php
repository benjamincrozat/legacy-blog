<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Redirect extends Resource
{
    public static $group = 'Blog';

    public static $model = \App\Models\Redirect::class;

    public static $search = [
        'id', 'from', 'to',
    ];

    public function title() : string
    {
        return "/$this->from → /$this->to";
    }

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            Text::make('From')
                ->rules('required', 'max:255')
                ->creationRules('unique:redirects,from')
                ->updateRules('unique:redirects,from,{{resourceId}}')
                ->sortable(),

            Text::make('To')
                ->rules('required', 'max:255')
                ->sortable(),
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
