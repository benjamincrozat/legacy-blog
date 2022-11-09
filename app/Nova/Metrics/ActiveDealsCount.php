<?php

namespace App\Nova\Metrics;

use App\Models\Deal;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;
use Laravel\Nova\Http\Requests\NovaRequest;

class ActiveDealsCount extends Value
{
    /**
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return new ValueResult(Deal::active()->count());
    }
}
