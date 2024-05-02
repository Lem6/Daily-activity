<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalandersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calanders', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('activity_name')->nullable();
            $table->string('date')->nullable();
            $table->integer('team_id')->unsigned()->nullable()->index();
            $table->integer('directorate_id')->unsigned()->nullable()->index();
            $table->integer('center_id')->unsigned()->nullable()->index();
            $table->string('all')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calanders');
    }
}
