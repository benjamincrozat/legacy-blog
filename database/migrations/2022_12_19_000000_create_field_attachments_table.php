<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('nova_pending_trix_attachments')) {
            Schema::rename('nova_pending_trix_attachments', 'nova_pending_field_attachments');
        } else {
            Schema::create('nova_pending_field_attachments', function (Blueprint $table) {
                $table->increments('id')->primary();
                $table->string('draft_id')->index();
                $table->string('attachment');
                $table->string('disk');
                $table->timestamps();
            });
        }

        if (Schema::hasTable('nova_trix_attachments')) {
            Schema::rename('nova_trix_attachments', 'nova_field_attachments');
        } else {
            Schema::create('nova_field_attachments', function (Blueprint $table) {
                $table->increments('id');
                $table->morphs('attachable');
                $table->string('attachment');
                $table->string('disk');
                $table->string('url')->index();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nova_pending_field_attachments');
        Schema::dropIfExists('nova_field_attachments');
    }
}
