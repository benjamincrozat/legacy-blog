<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use App\Nova\Metrics\ActiveDealsCount;
use Laravel\Nova\Http\Requests\NovaRequest;

class Deal extends Resource
{
    public static $group = 'Affiliate Marketing';

    public static $model = \App\Models\Deal::class;

    public static $title = 'content';

    public static $search = [
        'id', 'content', 'button',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Affiliate')
                ->sortable(),

            Text::make('Image')
                ->displayUsing(function () {
                    return <<<HTML
<img src="$this->image" width="50" height="50" class="aspect-square" style="object-fit: cover" />
HTML;
                })
                ->asHtml(),

            Markdown::make('Content')
                ->rules('required'),

            Text::make('Button')
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            DateTime::make('Start At')
                ->rules('required')
                ->sortable()
                ->displayUsing(fn () => $this->start_at?->diffForHumans()),

            DateTime::make('End At')
                ->rules('nullable')
                ->min(now()->startOfDay())
                ->sortable()
                ->displayUsing(fn () => $this->end_at?->diffForHumans()),

            Tag::make('Categories')
                ->displayAsList()
                ->showCreateRelationButton()
                ->withPreview(),
        ];
    }

    public function subtitle() : string
    {
        return substr($this->content, 0, 140);
    }

    public function cards(NovaRequest $request) : array
    {
        return [
            new ActiveDealsCount,
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
