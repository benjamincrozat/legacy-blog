<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('description')->nullable();
        });
    }

    public function down() : void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
