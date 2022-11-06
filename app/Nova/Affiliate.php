<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Number;
use App\Nova\Metrics\TotalAffiliateClicks;
use Laravel\Nova\Http\Requests\NovaRequest;

class Affiliate extends Resource
{
    public static $group = 'Affiliate Marketing';

    public static $model = \App\Models\Affiliate::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'slug', 'link',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->maxlength(60)
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Stack::make('Details', [
                Line::make('Name'),
                Line::make('Slug')->extraClasses('opacity-75 text-xs'),
            ])
            ->onlyOnIndex(),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Text::make('Link')
                ->rules('required', 'url'),

            Number::make('Clicks')
                ->rules('required', 'min:0')
                ->sortable(),
        ];
    }

    public function subtitle() : string
    {
        return $this->link;
    }

    public function cards(NovaRequest $request) : array
    {
        return [
            new TotalAffiliateClicks,
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
