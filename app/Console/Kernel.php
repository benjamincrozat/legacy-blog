<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\SitemapGenerateCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule) : void
    {
        $schedule
            ->command(SitemapGenerateCommand::class)
            ->daily()
            ->thenPing('http://beats.envoyer.io/heartbeat/wd65Mos3cOmSZS0');
    }

    protected function commands() : void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
