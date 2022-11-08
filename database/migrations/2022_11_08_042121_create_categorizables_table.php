<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::create('categorizables', function (Blueprint $table) {
            $table->foreignIdFor(Category::class)->constrained();
            $table->unsignedBigInteger('categorizable_id');
            $table->string('categorizable_type');
        });
    }

    public function down() : void
    {
        Schema::dropIfExists('categorizables');
    }
};
