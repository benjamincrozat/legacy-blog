<?php

namespace App\Events;

use App\Models\Category;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class CategoryDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $categorySlug;

    public function __construct(
        Category $category
    ) {
        $this->categorySlug = $category->slug;
    }
}
