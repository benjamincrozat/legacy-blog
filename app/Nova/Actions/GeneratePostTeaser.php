<?php

namespace App\Nova\Actions;

use Exception;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use App\Nova\Actions\Traits\ChangesModel;
use Illuminate\Contracts\Queue\ShouldQueue;

class GeneratePostTeaser extends Action implements ShouldQueue
{
    use ChangesModel, InteractsWithQueue, Queueable;

    public $name = 'Generate post teaser';

    public function handle(ActionFields $fields, Collection $posts) : Collection
    {
        foreach ($posts as $post) {
            try {
                (new \App\Actions\GeneratePostTeaser)->generate($post, $fields->model);

                $this->markAsFinished($post);
            } catch (Exception $e) {
                $this->markAsFailed($post, $e);
            }
        }

        return $posts;
    }
}
