<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('description', function (Blueprint $table) {
                $table->string('twitter_url')->nullable();
            });
        });
    }
};
