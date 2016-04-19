<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function($table)
        {
            $table->integer('background');
            $table->integer('file');
            $table->text('tag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sites', function($table)
        {
            $table->dropColumn('background');
            $table->dropColumn('file');
            $table->dropColumn('tag');
        });
    }
}
