<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\FathomFetchCommand;
use App\Console\Commands\SitemapGenerateCommand;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Laravel\Nova\Fields\Attachments\PruneStaleAttachments;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule) : void
    {
        $schedule
            ->command(FathomFetchCommand::class)
            ->hourly();

        $schedule
            ->call(new PruneStaleAttachments)
            ->daily();

        $schedule
            ->command(SitemapGenerateCommand::class)
            ->daily();
    }

    protected function commands() : void
    {
        $this->load(__DIR__ . '/Commands');
    }
}
