<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->boolean('highlighted')->default(false);
        });
    }

    public function down() : void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn('highlighted');
        });
    }
};
