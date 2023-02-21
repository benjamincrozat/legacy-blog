<?php

use App\Models\Post;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('affiliate_post', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Affiliate::class);
            $table->foreignIdFor(Post::class);
            $table->unsignedInteger('position')->nullable();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('affiliate_post');
    }
};
