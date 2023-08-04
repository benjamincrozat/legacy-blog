<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Events\MigrationsEnded;

class EnablePrimaryKeyRequirement
{
    public function handle(MigrationsEnded $event) : void
    {
        DB::statement('SET SESSION sql_require_primary_key = 1');
    }
}
