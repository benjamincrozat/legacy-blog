<?php

use App\Models\Affiliate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Affiliate::class)->constrained();
            $table->string('title');
            $table->text('content');
            $table->string('button');
            $table->timestamps();
        });

        $jasper = Affiliate::where('name', 'Jasper')->first()->banners()->create([
            'title' => 'Quick tip for productive bloggers',
            'content' => <<<MARKDOWN
I use **Jasper AI**{:.font-bold} to create SEO-optimized blog posts 10x&nbsp;faster.
MARKDOWN,
            'button' => <<<MARKDOWN
Get started with **10,000&nbsp;bonus&nbsp;credits**{:.font-bold}
MARKDOWN,
        ]);

        $fathomAnalytics = Affiliate::where('name', 'Fathom Analytics')->first()->banners()->create([
            'title' => 'Quick tip for business owners',
            'content' => <<<MARKDOWN
**Fathom Analytics**{:.font-bold} does a way better job than Google Analytics at GDPR-compliance.
MARKDOWN,
            'button' => <<<MARKDOWN
Get started with a **7-day trial & $10&nbsp;discount**{:.font-bold} on your first invoice.
MARKDOWN,
        ]);

        Affiliate::where('name', 'Cloudways')->first()->banners()->create([
            'title' => 'Quick tip for developers whose time is money',
            'content' => <<<MARKDOWN
**Cloudways**{:.font-bold} is here to provision PHP-optimized instances and deploy your apps within&nbsp;a&nbsp;few&nbsp;clicks.
MARKDOWN,
            'button' => <<<MARKDOWN
Get started with **30% off**{:.font-bold} for 3 months with&nbsp;code&nbsp;**TREAT22**{:.font-bold}.
MARKDOWN,
        ]);
    }

    public function down() : void
    {
        Schema::dropIfExists('banners');
    }
};
