<?php

namespace App\Nova\Metrics;

use App\Models\Subscriber;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Http\Requests\NovaRequest;

class SubscribersCount extends Value
{
    /**
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Subscriber::class);
    }

    public function ranges() : array
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            365 => __('365 Days'),
            'TODAY' => __('Today'),
            'MTD' => __('Month To Date'),
            'QTD' => __('Quarter To Date'),
            'YTD' => __('Year To Date'),
        ];
    }
}
