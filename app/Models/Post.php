<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\MediaLibrary\HasMedia;
use App\Models\Concerns\Searchable;
use App\Models\Concerns\HasFeedItems;
use App\Models\Concerns\LogsActivity;
use App\Models\Concerns\HasLocalScopes;
use App\Models\Concerns\HasMediaAttached;
use App\Models\Concerns\HasRelationships;

class Post extends BaseModel implements Feedable, HasMedia
{
    use HasFeedItems, HasLocalScopes, HasMediaAttached, HasRelationships, LogsActivity, Searchable;

    protected $casts = [
        'published_at' => 'datetime',
        'manually_updated_at' => 'date',
    ];
}
