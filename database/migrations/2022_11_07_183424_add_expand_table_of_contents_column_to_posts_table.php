<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('expand_table_of_contents')->default(false)->after('promotes_affiliate_links');
        });
    }

    public function down() : void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('expand_table_of_contents');
        });
    }
};
