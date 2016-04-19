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
            $table->integer('uid');
            $table->integer('status');
            $table->string('suburl', 100);
            $table->integer('logo')->change();
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
            $table->dropColumn('uid');
            $table->dropColumn('status');
            $table->dropColumn('suburl');
            $table->string('logo')->nullable()->change();
        });
    }
}
