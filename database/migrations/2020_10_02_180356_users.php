<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('erp_users', function(Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('login');
            $table->string('email');
            $table->integer('role');
            $table->foreign('role')->references('id')->on('erp_role');
            $table->string('password');
            $table->timestamp('acc_created_at');
            $table->string('adresse');
            $table->integer('cp');
            $table->string('ville');
            $table->tinyInteger('dispAddr')->default(0);
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
        //
    }
}
