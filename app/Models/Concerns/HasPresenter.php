<?php

namespace App\Models\Concerns;

use App\Models\Presenters\BasePresenter;

trait HasPresenter
{
    public function presenter() : BasePresenter
    {
        $presenter = 'App\\Models\\Presenters\\' . class_basename($this::class) . 'Presenter';

        return new $presenter($this);
    }
}
