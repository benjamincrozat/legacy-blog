<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'long_description',
                'content',
            ]);
        });
    }

    public function down() : void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('long_description')->nullable();
            $table->text('content')->nullable();
        });
    }
};
