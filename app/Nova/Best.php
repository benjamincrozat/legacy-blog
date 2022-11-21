<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use App\Nova\Actions\MoveBestUp;
use Laravel\Nova\Fields\Markdown;
use App\Nova\Actions\MoveBestDown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Best extends Resource
{
    public static $group = 'Blog';

    public static $model = \App\Models\Best::class;

    public static $search = [
        'id', 'post.title', 'affiliate.name',
    ];

    public function title() : string
    {
        return "{$this->affiliate->name} for {$this->post->title}";
    }

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Post')
                ->sortable(),

            BelongsTo::make('Affiliate')
                ->sortable(),

            Text::make('title')
                ->rules('required', 'max:255'),

            Markdown::make('description')
                ->rules('required'),

            Number::make('Position')
                ->rules('required', 'min:1')
                ->default(1)
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
        return [
            new MoveBestUp,
            new MoveBestDown,
        ];
    }
}
