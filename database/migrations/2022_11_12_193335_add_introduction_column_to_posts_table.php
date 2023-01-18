<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class() extends Migration {
    public function up() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('introduction')->nullable();
        });
    }

    public function down() : void
    {
        Schema::dropColumn('introduction');
    }
};
