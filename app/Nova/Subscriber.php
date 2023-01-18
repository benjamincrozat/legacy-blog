<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Gravatar;
use App\Nova\Metrics\SubscribersCount;
use Laravel\Nova\Http\Requests\NovaRequest;

class Subscriber extends Resource
{
    public static $model = \App\Models\Subscriber::class;

    public static $title = 'email';

    public static $search = [
        'id', 'email',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            Gravatar::make()->maxWidth(32),

            Text::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:subscribers,email')
                ->updateRules('unique:subscribers,email,{{resourceId}}'),

            DateTime::make('Created At')
                ->sortable()
                ->displayUsing(fn () => $this->modified_at?->isoFormat('lll'))
                ->exceptOnForms(),
        ];
    }

    public function cards(NovaRequest $request) : array
    {
        return [
            new SubscribersCount(),
        ];
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
