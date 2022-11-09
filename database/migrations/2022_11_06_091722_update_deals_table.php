<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->timestamp('start_at')->nullable()->after('button');
            $table->timestamp('end_at')->nullable()->after('start_at');
        });
    }

    public function down() : void
    {
        Schema::table('deals', function (Blueprint $table) {
            $table->dropColumn(['start_at', 'end_at']);
        });
    }
};
