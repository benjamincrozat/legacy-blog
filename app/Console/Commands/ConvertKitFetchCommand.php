<?php

namespace App\Console\Commands;

use App\Models\Subscriber;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ConvertKitFetchCommand extends Command
{
    protected $signature = 'convertkit:fetch';

    protected $description = 'Fetch subscriber from ConvertKit';

    public function handle() : int
    {
        $subscribers = collect();

        do {
            $response = Http::get('https://api.convertkit.com/v3/subscribers', [
                'api_secret' => config('services.convertkit.api_secret'),
                'page' => $page ??= 1,
            ])
            ->throw()
            ->json();

            $subscribers = $subscribers->concat($response['subscribers']);

            ++$page;
        } while ($response['page'] < $response['total_pages']);

        $subscribers->each(function (array $subscriber) {
            $subscriber = Subscriber::firstOrCreate([
                'email' => $subscriber['email_address'],
                'created_at' => Carbon::parse($subscriber['created_at']),
            ]);

            if ($subscriber->wasRecentlyCreated) {
                $this->info("Imported {$subscriber->email}");
            }
        });

        return Command::SUCCESS;
    }
}
