<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagedQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engaged_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('engaged_assessment_id')->nullable(); //engaged_assessment
            $table->text('question')->nullable();
            $table->string('resource_id')->nullable(); //if video or pic or even adio
            $table->integer('minutes_expected')->nullable(); // minutes expected / not strict
            $table->boolean('seen')->nullable(); //
            $table->bigInteger('seen_time')->nullable(); //
            $table->boolean('answered')->nullable(); //
            $table->bigInteger('answered_time')->nullable(); //
            $table->string('answer_input')->nullable(); //radio, checkbox, field
            $table->timestamps();

            $table->foreign('engaged_assessment_id')
                  ->references('uuid')
                  ->on('engaged_assessments')
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
        Schema::dropIfExists('engaged_questions');
    }
}
