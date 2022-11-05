<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    public static $model = \App\Models\Post::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'content',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Author', 'user', User::class),

            Text::make('Image')
                ->displayUsing(function () {
                    $image = str_replace('w_auto', 'w_100', $this->image);

                    return <<<HTML
<img src="$image" width="50" height="50" class="aspect-square" style="object-fit: cover" />
HTML;
                })
                ->asHtml(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:60'),

            Text::make('Slug')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Markdown::make('Content')
                ->rules('required'),

            Textarea::make('Description')
                ->rules('required', 'max:160'),

            Boolean::make('Affiliate', 'promotes_affiliate_links')
                ->sortable(),

            DateTime::make('Modified At')
                ->displayUsing(fn () => $this->modified_at?->isoFormat('LL'))
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
