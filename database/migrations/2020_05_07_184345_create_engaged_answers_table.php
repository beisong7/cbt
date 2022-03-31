<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagedAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engaged_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('engaged_assessment_id')->nullable(); //engaged assessment key
            $table->uuid('engaged_question_id')->nullable(); //engaged question key
            $table->string('answer')->nullable();
            $table->boolean('correct')->nullable();
            $table->boolean('selected')->nullable();
            $table->string('value')->nullable();
            $table->timestamps();

            $table->foreign('engaged_assessment_id')
                  ->references('uuid')
                  ->on('engaged_assessments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('engaged_question_id')
                  ->references('uuid')
                  ->on('engaged_questions')
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
        Schema::dropIfExists('engaged_answers');
    }
}
