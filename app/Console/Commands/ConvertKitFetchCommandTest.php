<?php

namespace App\Console\Commands;

use Tests\TestCase;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Http;

class ConvertKitFetchCommandTest extends TestCase
{
    public function test_it_fetches_subscribers_from_convertkit() : void
    {
        Http::fakeSequence()
            ->push([
                'subscribers' => [[
                    'email_address' => $email = fake()->safeEmail(),
                    'created_at' => now()->toDateTimeString(),
                ]],
            ]);

        $this->assertDatabaseCount(Subscriber::class, 0);

        $this
            ->artisan(ConvertKitFetchCommand::class)
            ->expectsOutput("Imported $email")
            ->assertSuccessful()
        ;

        $this->assertDatabaseHas(Subscriber::class, compact('email'));
    }
}
