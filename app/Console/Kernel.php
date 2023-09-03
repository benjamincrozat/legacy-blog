<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\AnalyticsFetchCommand;
use Spatie\Activitylog\CleanActivitylogCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule) : void
    {
        $schedule
            ->command(AnalyticsFetchCommand::class)
            ->hourly();

        $schedule
            ->command(CleanActivitylogCommand::class)
            ->daily();
    }

    protected function commands() : void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
