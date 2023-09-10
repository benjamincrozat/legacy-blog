<?php

use App\Models\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('is_published');

            $table->dateTime('published_at')->nullable();
        });

        Post::cursor()->each(function (Post $post) {
            $post->update(['published_at' => $post->created_at]);
        });
    }

    public function down() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('published_at')->default(false);

            $table->dropColumn('published_at');
        });
    }
};
