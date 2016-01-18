<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('notes');
            $table->integer('user_id')->unsigned();
            $table->boolean('billable');
            $table->string('attachments');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('task_categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tasks');
    }
}
