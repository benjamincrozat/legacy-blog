<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('affiliates', function (Blueprint $table) {
            $table->renameColumn('image', 'icon');
            $table->string('screenshot')->nullable();
            $table->text('take')->nullable();
            $table->unsignedInteger('rating')->default(0);
            $table->string('annual_discount')->nullable();
            $table->string('guarantee')->nullable();
            $table->text('content')->nullable();
            $table->text('pricing')->nullable();
            $table->text('key_features')->nullable();
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->string('highlight_title')->nullable();
            $table->text('highlight_text')->nullable();
            $table->unsignedInteger('position')->default(false);
        });
    }

    public function down() : void
    {
        Schema::table('affiliates', function (Blueprint $table) {
        });
    }
};
