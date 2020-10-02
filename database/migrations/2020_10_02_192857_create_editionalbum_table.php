<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionalbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_editionalbum', function (Blueprint $table) {
            $table->id();
            $table->integer('id_album');
            $table->foreign('id_album')->references('id')->on('erp_album');
            $table->integer('id_edition');
            $table->foreign('id_edition')->references('id')->on('erp_edition');
            $table->integer('stock');
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
        Schema::dropIfExists('editionalbum');
    }
}
