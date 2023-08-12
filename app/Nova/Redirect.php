<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Redirect extends Resource
{
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

            Text::make('From → To', fn () => <<<HTML
<a href="/{$this->from}">
<span style="color: #f95661">/{$this->from}</span> → <span style="color: #56c86d">/{$this->to}</span>
</a>
HTML)
                ->asHtml()
                ->onlyOnIndex(),

            Text::make('From')
                ->rules('required', 'max:255')
                ->creationRules('unique:redirects,from')
                ->updateRules('unique:redirects,from,{{resourceId}}')
                ->sortable()
                ->hideFromIndex(),

            Text::make('To')
                ->rules('required', 'max:255')
                ->sortable()
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
