<?php

namespace App\Models\Presenters;

use Illuminate\Database\Eloquent\Model;

abstract class BasePresenter
{
    public function __construct(
        public Model $model
    ) {
    }
}
