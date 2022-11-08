<?php

namespace App\Nova\Metrics;

use App\Models\Category;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;
use Laravel\Nova\Http\Requests\NovaRequest;

class CategoriesCount extends Value
{
    /**
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return new ValueResult(Category::count());
    }
}
