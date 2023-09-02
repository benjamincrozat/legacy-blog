<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('highlight')->default(false);
        });
    }

    public function down() : void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('highlight');
        });
    }
};
