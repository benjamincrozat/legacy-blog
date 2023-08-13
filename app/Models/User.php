<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function gravatar() : Attribute
    {
        return Attribute::make(
            fn () => 'https://www.gravatar.com/avatar/' . md5($this->email)
        )->shouldCache();
    }

    public function renderedDescription() : Attribute
    {
        return Attribute::make(
            fn () => Str::markdown($this->description ?? '')
        )->shouldCache();
    }
}
