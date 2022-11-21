<?php

use App\Models\Post;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('bests', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class)->constrained();
            $table->foreignIdFor(Affiliate::class)->constrained();
            $table->unsignedBigInteger('position')->default(0);
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('bests');
    }
};
