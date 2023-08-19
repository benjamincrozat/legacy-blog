<?php

namespace App\Models;

use Filament\Panel;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
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
            fn () : string => 'https://www.gravatar.com/avatar/' . md5($this->email)
        );
    }

    public function description() : Attribute
    {
        return Attribute::make(
            fn (?string $value) : string => Str::markdown($value ?? '')
        )->shouldCache();
    }

    public function canAccessPanel(Panel $panel) : bool
    {
        return true;
    }

    public function getFilamentAvatarUrl() : ?string
    {
        return $this->gravatar;
    }
}
