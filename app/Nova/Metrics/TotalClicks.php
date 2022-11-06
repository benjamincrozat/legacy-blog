<?php

namespace App\Nova\Metrics;

use App\Models\Affiliate;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;
use Laravel\Nova\Http\Requests\NovaRequest;

class TotalClicks extends Value
{
    /**
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return new ValueResult(Affiliate::sum('clicks'));
    }
}
