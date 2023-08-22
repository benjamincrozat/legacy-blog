<?php

namespace App\Models;

use App\Models\Concerns\HasPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory, HasPresenter;
}
