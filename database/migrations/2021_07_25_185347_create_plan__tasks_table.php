<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan__tasks', function(Blueprint $table)
        {
            $table->increments('id');
            // $table->date();
            $table->timestamps();
            $table->string('task_name')->nullable();
            $table->integer('task_type')->default(0);
            $table->string('progress')->default(0);
            $table->string('percent')->nullable();
            $table->text('description', 1000)->nullable();
            $table->text('challenge')->nullable();
            $table->integer('approved_by')->unsigned()->nullable()->index();
            $table->integer('approved_status')->default(0);
            $table->integer('edit_status')->default(0);
            $table->string('reject_reason')->nullable();
            $table->integer('color_id')->unsigned()->nullable()->index();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->text('users')->nullable();
            $table->integer('team_id')->unsigned()->nullable()->index();
            $table->integer('directorate_id')->unsigned()->nullable()->index();
            $table->integer('center_id')->unsigned()->nullable()->index();
            $table->integer('for_all')->nullable();
            $table->integer('plan_task_id')->unsigned()->nullable()->index();
            $table->string('planing_time')->nullable();
            $table->string('progress_time')->nullable();
            $table->string('given_by')->nullable();
            $table->integer('parent_id')->unsigned()->nullable()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('plan__tasks');
    }
}
