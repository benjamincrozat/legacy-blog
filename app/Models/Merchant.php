<?php

namespace App\Models;

use App\Models\Concerns\HasPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory, HasPresenter;

    public static function booted() : void
    {
        static::saved(function (self $model) {
            $pending = dispatch(function () use ($model) {
                $model->presenter()->take();
                $model->presenter()->keyFeatures();
                $model->presenter()->content();
                $model->presenter()->pros();
                $model->presenter()->cons();
            });

            if (! app()->runningUnitTests()) {
                $pending->afterResponse();
            }
        });
    }
}
