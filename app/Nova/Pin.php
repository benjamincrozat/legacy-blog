<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;

class Pin extends Resource
{
    public static $model = \App\Models\Pin::class;

    public static $title = 'post.title';

    public static $search = [
        'id', 'post.title', 'post.slug',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            Text::make('Image', function () {
                $image = str_replace('w_auto', 'h_100', $this->post->image);

                return <<<HTML
<img src="$image" width="50" height="50" class="aspect-square" style="object-fit: cover" />
HTML;
            })
                ->asHtml()
                ->onlyOnIndex(),

            Text::make('Image', fn () => "<img src=\"{$this->post->image}\" />")
                ->asHtml()
                ->onlyOnDetail(),

            BelongsTo::make('Post')
                ->searchable(),

            DateTime::make('Created At')
                ->displayUsing(fn () => $this->created_at->isoFormat('lll'))
                ->exceptOnForms(),
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
