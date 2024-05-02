<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutOfPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_of_plans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();
            $table->string('activity')->nullable();
            $table->string('date')->nullable();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->integer('team_id')->unsigned()->nullable()->index();
            $table->integer('directorate_id')->unsigned()->nullable()->index();
            $table->integer('center_id')->unsigned()->nullable()->index();
            $table->integer('approved_by')->unsigned()->nullable()->index();
            $table->string('reject_reason')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('out_of_plans');
    }
}
