<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up() : void
    {
        Schema::create('openings', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('description');
            $table->string('link');
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('openings');
    }
};
