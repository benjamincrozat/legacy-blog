<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Affiliate extends Resource
{
    public static $model = \App\Models\Affiliate::class;

    public static $title = 'name';

    public static $search = [
        'id', 'name', 'slug', 'link', 'take', 'annual_discount', 'guarantee', 'key_features', 'pros', 'cons',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            URL::make('Icon')
                ->displayUsing(function () {
                    return <<<HTML
<img src="$this->icon" width="50" height="50" class="aspect-square" style="object-fit: cover" />
HTML;
                })
                ->asHtml(),

            URL::make('Screenshot')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

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
                ->rules('nullable', 'url'),

            Markdown::make('Take')
                ->rules('nullable')
                ->hideFromIndex(),

            Number::make('Rating')
                ->rules('nullable', 'min:0', 'max:10')
                ->hideFromIndex(),

            Text::make('Annual discount')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Text::make('Guarantee')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Markdown::make('Content')
                ->rules('required'),

            Markdown::make('Pricing')
                ->rules('nullable')
                ->hideFromIndex(),

            Markdown::make('Key features')
                ->rules('nullable')
                ->hideFromIndex(),

            Markdown::make('Pros')
                ->rules('nullable')
                ->hideFromIndex(),

            Markdown::make('Cons')
                ->rules('nullable')
                ->hideFromIndex(),

            Text::make('Highlight title')
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Markdown::make('Highlight text')
                ->rules('required'),

            BelongsToMany::make('Posts')
                ->fields(function () {
                    return [
                        Number::make('Position')
                            ->rules('nullable', 'min:1'),
                    ];
                })
                ->searchable(),
        ];
    }

    public function subtitle() : string
    {
        return $this->link;
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
