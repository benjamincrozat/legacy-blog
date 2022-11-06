<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Banner extends Resource
{
    public static $group = 'Affiliate Marketing';

    public static $model = \App\Models\Banner::class;

    public static $title = 'name';

    public static $search = [
        'id', 'title', 'content', 'button',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Affiliate'),

            Text::make('Title')
                ->rules('required', 'max:255'),

            Markdown::make('Content')
                ->rules('required'),

            Text::make('Button')
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            DateTime::make('Start At')
                ->rules('required')
                ->min(now()),

            DateTime::make('End At')
                ->rules('nullable')
                ->min(now()),
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
