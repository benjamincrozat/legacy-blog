<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->after('highlight_text', function (Blueprint $table) {
                $table->string('ad_title')->nullable();
                $table->text('ad_content')->nullable();
            });
        });
    }
};
