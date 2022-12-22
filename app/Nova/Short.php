<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Short extends Resource
{
    public static $model = \App\Models\Short::class;

    public static $title = 'url';

    public static $search = [
        'id', 'url',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->rules('nullable', 'max:255'),

            Slug::make('Slug')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            URL::make('URL')
                ->displayUsing(fn () => $this->url)
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            URL::make('Short URL', fn () => 'https://' . config('app.shorts_domain') . '/' . $this->slug)
                ->displayUsing(fn () => 'https://' . config('app.shorts_domain') . '/' . $this->slug)
                ->exceptOnForms(),

            Text::make('Campaign name')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Campaign source')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Campaign medium')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Campaign content')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Campaign term')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),
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
