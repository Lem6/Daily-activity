<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->time('plan_start_time')->nullable();
            $table->time('plan_end_time')->nullable();
            $table->time('progress_start_time')->nullable();
            $table->time('progress_end_time')->nullable();
            $table->string('color')->nullable();
            $table->string('edit_time')->default(10);
            $table->string('name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('colors');
    }
}
