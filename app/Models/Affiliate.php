<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affiliate extends BaseModel
{
    use HasFactory;

    public function deals() : HasMany
    {
        return $this->hasMany(Deal::class);
    }
}
