<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('vatn')->nullable();
            $table->string('doy')->nullable();
//            $table->string('object');
            $table->string('address');
            $table->string('phone');
            $table->string('site')->nullable();
            $table->string('email');
            $table->string('socialf')->nullable();
            $table->string('socialt')->nullable();
            $table->string('sociall')->nullable();
            $table->string('sociali')->nullable();
            $table->string('socialy')->nullable();
            $table->string('logo')->nullable();
            $table->string('descriptionobj');
            $table->string('description');
            $table->string('slogan')->nullable();
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
        Schema::drop('sites');
    }
}
