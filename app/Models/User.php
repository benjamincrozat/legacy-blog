<?php

namespace App\Models;

use Filament\Panel;
use App\Presenters\UserPresenter;
use App\Models\Concerns\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, LogsActivity, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function presenter() : UserPresenter
    {
        return new UserPresenter($this);
    }

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
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
