<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('sessions', 'sessions_last_7_days');
            $table->unsignedBigInteger('sessions_last_30_days')->default(0);
        });
    }

    public function down() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('sessions_last_7_days', 'sessions');
            $table->dropColumn('sessions_last_30_days');
        });
    }
};
