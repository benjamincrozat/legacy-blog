<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Nova\Http\Requests\NovaRequest;

class MoveBestUp extends Action
{
    use InteractsWithQueue, Queueable;

    public $showInline = true;

    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each(function ($model) {
            if ($model->position > 1) {
                $model
                    ->query()
                    ->where('position', $model->position - 1)
                    ->update(['position' => $model->position]);

                $model->decrement('position');
            }
        });
    }

    public function fields(NovaRequest $request) : array
    {
        return [];
    }
}
