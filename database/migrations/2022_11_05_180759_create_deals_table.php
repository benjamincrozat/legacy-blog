<?php

use App\Models\Affiliate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Affiliate::class)->constrained();
            $table->string('image')->nullable();
            $table->text('content');
            $table->string('button');
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('deals');
    }
};
