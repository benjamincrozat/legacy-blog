<?php

namespace App\Nova;

use Laravel\Nova\Panel;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Badge;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use App\Nova\Actions\GeneratePostTeaser;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Actions\GeneratePostDescription;

class Post extends Resource
{
    public static $model = \App\Models\Posts\Post::class;

    public static $title = 'title';

    public function subtitle() : string
    {
        return $this->slug;
    }

    public function fields(NovaRequest $request) : array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Author', 'user', User::class)
                ->filterable()
                ->searchable()
                ->sortable(),

            Text::make('Image')
                ->displayUsing(function () {
                    $image = str_replace('w_auto', 'h_100', $this->image);

                    return <<<HTML
<img src="$image" width="50" height="50" class="aspect-square" style="object-fit: cover" />
HTML;
                })
                ->asHtml()
                ->onlyOnIndex(),

            URL::make('Image')
                ->displayUsing(function () {
                    $image = str_replace('w_auto', 'h_100', $this->image);

                    return "<img src=\"$image\" />";
                })
                ->asHtml()
                ->hideFromIndex(),

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

            Markdown::make('Introduction')
                ->rules('nullable')
                ->help('The introduction always comes before the table of contents.'),

            Markdown::make('Content')
                ->rules('nullable')
                ->help('The introduction always comes after the table of contents and the image.'),

            Markdown::make('Conclusion')
                ->rules('nullable'),

            Panel::make('Others', [
                Textarea::make('Description')
                    ->maxlength(160)
                    ->rules('nullable')
                    ->help('This must be a short description. It will be used by search engines, social media previews, and the homepage of the blog. When left blank, GPT will generate it automatically.'),

                Markdown::make('Teaser')
                    ->rules('nullable')
                    ->help("This must be a piece of content that teases the article and gives the user a urge to click. For now, it's used for the RSS feed. When left blank, GPT will generate it automatically."),

                Badge::make('Promotes affiliate links')->map([
                    true => 'success',
                    false => 'info',
                ])->labels([
                    true => 'Yes',
                    false => 'No',
                ])
                    ->hideFromIndex(),

                Boolean::make('Promotes affiliate links')
                    ->filterable()
                    ->sortable()
                    ->onlyOnForms()
                    ->help('When enabled, this setting will put users in a sales funnel, free of potential distractions.'),

                URL::make('Community link')
                    ->rules('nullable', 'max:255')
                    ->hideFromIndex(),

                Date::make('Modified At')
                    ->displayUsing(fn () => $this->modified_at?->isoFormat('ll'))
                    ->sortable(),
            ]),

            BelongsToMany::make('Affiliates')
                ->fields(function () {
                    return [
                        Number::make('Position')
                            ->rules('nullable', 'min:1'),

                        Boolean::make('Highlight'),

                        Text::make('Highlight title')
                            ->rules('nullable', 'max:255')
                            ->help('When this affiliate is highlighted at the top of a post, this title will be shown.'),

                        Markdown::make('Highlight text')
                            ->rules('nullable', 'max:255')
                            ->help('When this affiliate is highlighted at the top of a post, this text will be shown.'),
                    ];
                })
                ->searchable(),

            HasMany::make('Pins'),
        ];
    }

    public function actions(NovaRequest $request) : array
    {
        return [
            (new GeneratePostDescription)->showInline(),
            (new GeneratePostTeaser)->showInline(),
        ];
    }
}
