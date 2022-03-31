<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagedAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engaged_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('organization_id')->nullable();
            $table->uuid('assessment_id')->nullable(); // assessment uuid
            $table->uuid('candidate_id')->nullable(); //user uuid
            $table->bigInteger('to_expire_at')->nullable();
            $table->bigInteger('start_time')->nullable(); //unix when user starts
            $table->bigInteger('last_update')->nullable(); //unix last activity after start
            $table->bigInteger('end_time')->nullable(); //unix end / submit timestamp
            $table->boolean('completed')->nullable();
            $table->boolean('has_started')->nullable();
            $table->float('score', 4, 1)->nullable();//percentage
            $table->integer('questions_answered')->nullable();
            $table->boolean('active')->nullable();
            $table->bigInteger('resume_time')->nullable();
            $table->timestamps();

            $table->foreign('organization_id')
                  ->references('uuid')
                  ->on('organizations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('assessment_id')
                  ->references('uuid')
                  ->on('assessments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('candidate_id')
                  ->references('uuid')
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engaged_assessments');
    }
}
