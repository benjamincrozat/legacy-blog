<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->text('description')->nullable();
            $table->text('teaser')->nullable();
            $table->string('community_link')->nullable();
            $table->boolean('commercial')->default(false);
            $table->boolean('is_published')->default(false);
            $table->unsignedBigInteger('sessions')->default(0);
            $table->timestamps();
            $table->datetime('manually_updated_at')->nullable();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('posts');
    }
};
