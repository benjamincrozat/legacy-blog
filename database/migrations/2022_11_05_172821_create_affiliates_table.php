<?php

use App\Models\Affiliate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('link');
        });

        Affiliate::create([
            'name' => 'Cloudways',
            'slug' => 'cloudways',
            'link' => 'https://www.cloudways.com/en/?id=1242932',
        ]);

        Affiliate::create([
            'name' => 'DigitalOcean',
            'slug' => 'digitalocean',
            'link' => 'https://m.do.co/c/58bbdf89fc72',
        ]);

        Affiliate::create([
            'name' => 'Fathom Analytics',
            'slug' => 'fathom-analytics',
            'link' => 'https://usefathom.com/ref/JTPOCN',
        ]);

        Affiliate::create([
            'name' => 'Jasper',
            'slug' => 'jasper',
            'link' => 'https://jasper.ai/?fpr=benjamincrozat',
        ]);

        Affiliate::create([
            'name' => 'Tweet Hunter',
            'slug' => 'tweet-hunter',
            'link' => 'https://tweethunter.io/?via=benjamincrozat',
        ]);

        Affiliate::create([
            'name' => 'Vultr',
            'slug' => 'vultr',
            'link' => 'https://www.vultr.com/?ref=9270908',
        ]);
    }

    public function down() : void
    {
        Schema::dropIfExists('affiliates');
    }
};
