<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('password_resets', function (Blueprint $table) {
            $table->id();
        });
    }

    public function down() : void
    {
        Schema::table('password_resets', function (Blueprint $table) {
            //
        });
    }
};
