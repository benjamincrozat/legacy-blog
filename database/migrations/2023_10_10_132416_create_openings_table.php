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
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('remote_status')->nullable();
            $table->unsignedBigInteger('minimum_salary')->nullable();
            $table->unsignedBigInteger('maximum_salary')->nullable();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('openings');
    }
};
