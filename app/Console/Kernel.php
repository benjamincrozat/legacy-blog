<?php

namespace App\Console;

use Spatie\Backup\Commands\BackupCommand;
use Spatie\Backup\Commands\CleanupCommand;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\FathomFetchCommand;
use App\Console\Commands\ConvertKitFetchCommand;
use App\Console\Commands\SitemapGenerateCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule) : void
    {
        $schedule
            ->command(ConvertKitFetchCommand::class)
            ->hourly()
            ->thenPing('http://beats.envoyer.io/heartbeat/0OF0imcmjbELTUR');

        $schedule
            ->command(FathomFetchCommand::class)
            ->hourly()
            ->thenPing('http://beats.envoyer.io/heartbeat/317ooOw84HNC2XI');

        $schedule
            ->command(SitemapGenerateCommand::class)
            ->daily()
            ->thenPing('http://beats.envoyer.io/heartbeat/wd65Mos3cOmSZS0');

        $schedule->command(CleanupCommand::class)
            ->daily()
            ->at('01:00')
            ->thenPing('http://beats.envoyer.io/heartbeat/iUQp12hbGnbfa5p');

        $schedule->command(BackupCommand::class)
            ->daily()
            ->at('01:30')
            ->thenPing('http://beats.envoyer.io/heartbeat/XEc4v1JxeZ7NX0O');
    }

    protected function commands() : void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
