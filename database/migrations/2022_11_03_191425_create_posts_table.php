<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('image')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('content');
            $table->text('description');
            $table->boolean('promotes_affiliate_links')->default(false);
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
            $table->datetime('modified_at')->nullable();

            $table->fullText(['content', 'description']);
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('posts');
    }
};
