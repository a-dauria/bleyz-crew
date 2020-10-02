<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotealbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_notealbum', function (Blueprint $table) {
            $table->id();
            $table->float('note', 3, 2);
            $table->timestamp('created_at')->default(\Carbon\Carbon::now());
            $table->timestamp('updated_at')->default(\Carbon\Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notealbum');
    }
}
