<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Post::class);
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('category_post');
    }
};
