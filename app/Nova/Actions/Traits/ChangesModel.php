<?php

namespace App\Nova\Actions\Traits;

use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

trait ChangesModel
{
    public function fields(NovaRequest $request)
    {
        return [
            Select::make('Model')
                ->options([
                    'gpt-3.5-turbo-16k' => 'gpt-3.5-turbo-16k',
                    'gpt-3.5-turbo' => 'gpt-3.5-turbo',
                    'gpt-4' => 'gpt-4',
                ])
                ->default('gpt-3.5-turbo-16k'),
        ];
    }
}
