<?php

use App\Models\Posts\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class);
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('pins');
    }
};
