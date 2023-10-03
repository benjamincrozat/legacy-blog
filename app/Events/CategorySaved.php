<?php

namespace App\Events;

use App\Models\Category;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CategorySaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Category $category
    ) {
    }
}
