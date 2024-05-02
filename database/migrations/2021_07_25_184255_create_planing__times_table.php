<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlaningTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planing__times', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('plan_start_time')->nullable();
            $table->string('plan_end_time')->nullable();
            $table->string('progress_start_time')->nullable();
            $table->string('progress_end_time')->nullable();
            $table->string('additional_time')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('planing__times');
    }
}
