<?php

namespace App\Console\Commands;

use App\Fathom\Client;
use Illuminate\Console\Command;

class FathomFetchCommand extends Command
{
    protected $signature = 'fathom:fetch';

    protected $description = 'Fetch data from Fathom';

    public function handle(Client $client) : int
    {
        return Command::SUCCESS;
    }
}
