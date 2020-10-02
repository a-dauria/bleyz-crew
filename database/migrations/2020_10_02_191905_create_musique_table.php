<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusiqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_musique', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path_song_srv');
            $table->string('link_yt');
            $table->integer('rangMusique');
            $table->integer('nbre_ecoute');
            $table->integer('id_album');
            $table->foreign('id_album')->references('id')->on('erp_album');
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
        Schema::dropIfExists('musique');
    }
}
