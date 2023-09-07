<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Events\MigrationsStarted;

// Managed databases on DigitalOcean require a primary key on all tables.
// Sometimes, Laravel packages do not define one, which is problematic.
class DisablePrimaryKeyRequirement
{
    public function handle(MigrationsStarted $event) : void
    {
        DB::statement('SET SESSION sql_require_primary_key = 0');

        activity()->disableLogging();
    }
}
