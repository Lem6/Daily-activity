<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLatePlanningPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('late__planning__permissions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('deadline')->nullable();
            $table->string('status_activation')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('late__planning__permissions');
    }
}
