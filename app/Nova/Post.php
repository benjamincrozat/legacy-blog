<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Tag;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Stack;
use App\Nova\Metrics\PostsCount;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use App\Nova\Metrics\PostsIntent;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    public static $group = 'Blog';

    public static $model = \App\Models\Post::class;

    public static $title = 'title';

    public static $search = [
        'id', 'title', 'slug', 'content', 'description',
    ];

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Author', 'user', User::class)
                ->sortable(),

            Text::make('Image')
                ->displayUsing(function () {
                    $image = str_replace('w_auto', 'h_100', $this->image);

                    return <<<HTML
<img src="$image" width="50" height="50" class="aspect-square" style="object-fit: cover" />
HTML;
                })
                ->asHtml(),

            Text::make('Title')
                ->maxlength(60)
                ->rules('required', 'max:255')
                ->sortable()
                ->hideFromIndex(),

            Stack::make('Details', [
                Line::make('Title')
                    ->displayUsing(function () {
                        $title = strlen($this->title) > 60
                            ? substr($this->title, 0, 60) . '…'
                            : $this->title;

                        $link = route('posts.show', $this->resource);

                        return "<a href=\"$link\" target=\"_blank\" class=\"link-default\">$title</a>";
                    })
                    ->asHtml(),
                Line::make('Slug')->extraClasses('opacity-75 text-xs'),
            ])
            ->onlyOnIndex(),

            Text::make('Slug')
                ->rules('required', 'max:255')
                ->sortable()
                ->hideFromIndex(),

            Markdown::make('Content')
                ->rules('required'),

            Panel::make('SEO', [
                Textarea::make('Description')
                    ->maxlength(160)
                    ->rules('required'),

                Tag::make('Categories')
                    ->displayAsList()
                    ->showCreateRelationButton()
                    ->withPreview(),

                Boolean::make('Promotes affiliate links')
                    ->sortable()
                    ->onlyOnForms(),

                Badge::make('Intent', 'promotes_affiliate_links')
                    ->map([
                        true => 'success',
                        false => 'info',
                    ])
                    ->labels([
                        true => 'Commercial',
                        false => 'Informational',
                    ])
                    ->sortable()
                    ->exceptOnForms(),

                Date::make('Modified At')
                    ->displayUsing(fn () => $this->modified_at?->isoFormat('ll'))
                    ->sortable(),
            ]),

            HasMany::make('Highlights'),
        ];
    }

    public function subtitle() : string
    {
        return $this->slug;
    }

    public function cards(NovaRequest $request) : array
    {
        return [
            new PostsIntent,
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
