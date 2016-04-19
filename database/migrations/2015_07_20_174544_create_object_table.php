<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('oid');
            $table->string('object');
            $table->timestamps();
        });

        Schema::create('object_site', function (Blueprint $table) {
            $table->integer('site_id')->unsigned()->index();
            $table->foreign('site_id')->references('id')->on('site')->onDelete('cascade');
            $table->integer('object_id')->unsigned()->index();
            $table->foreign('object_id')->references('id')->on('object')->onDelete('cascade');
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
        Schema::drop('objects');
        Schema::drop('object_site');
    }
}
