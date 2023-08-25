<?php

namespace App\Console\Commands;

use App\Models\Merchant;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MerchantsFetchCommand extends Command
{
    protected $signature = 'merchants:fetch';

    protected $description = 'Fetch merchants from the production database';

    public function handle() : void
    {
        DB::connection('production')
            ->table('affiliates')
            ->get()
            ->each(function (object $merchant) {
                Merchant::create([
                    'name' => $merchant->name,
                    'slug' => $merchant->slug,
                    'link' => $merchant->link,
                    'created_at' => $merchant->created_at,
                ]);

                $this->info("Merchant $merchant->name has been fetched.");
            });

        $this->info('Merchants from production have all been fetched.');
    }
}
