<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('designation_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('description')->nullable();
            $table->string('experience')->nullable();
            $table->string('opening')->nullable();
            $table->string('salary')->nullable();
            $table->dateTime('job_open_date')->nullable();
            $table->dateTime('turn_around_date')->nullable();
            $table->string('mail_to')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('job_requirements');
    }
}
