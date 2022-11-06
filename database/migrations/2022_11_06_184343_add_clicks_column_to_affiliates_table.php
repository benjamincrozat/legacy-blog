<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->unsignedBigInteger('clicks')->default(0);
        });
    }

    public function down() : void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            //
        });
    }
};
