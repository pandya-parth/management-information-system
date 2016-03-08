<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comu_skill')->nullable();
            $table->string('tech_skill')->nullable();
            $table->string('personality')->nullable();
            $table->string('education')->nullable();
            $table->string('job_stability')->nullable();
            $table->string('overall')->nullable();
            $table->string('notes')->nullable();
            $table->string('attach')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('candidate_scores');
    }
}
