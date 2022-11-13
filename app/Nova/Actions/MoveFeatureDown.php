<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Nova\Http\Requests\NovaRequest;

class MoveFeatureDown extends Action
{
    use InteractsWithQueue, Queueable;

    public $showInline = true;

    public function handle(ActionFields $fields, Collection $models)
    {
        $models->each(function (Model $model) {
            $model
                ->query()
                ->where('position', $model->position + 1)
                ->update(['position' => $model->position]);

            $model->increment('position');
        });
    }

    public function fields(NovaRequest $request) : array
    {
        return [];
    }
}
