<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umessages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('sid');
            $table->string('type');
            $table->string('description')->nullable();
            $table->date('triggered_at')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('umessages');
    }
}
