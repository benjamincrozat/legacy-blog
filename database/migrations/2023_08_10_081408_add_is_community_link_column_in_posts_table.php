<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('is_community_link')->default(false);
        });
    }

    public function down() : void
    {
        Schema::table('posts', function (Blueprint $table) {

            $table->dropColumn('is_community_link');
        });
    }
};
