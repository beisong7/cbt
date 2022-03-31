<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('assessment_id')->nullable();
            $table->uuid('question_id')->nullable();
            $table->string('answer')->nullable();
            $table->boolean('correct')->nullable();
            $table->timestamps();

            $table->foreign('assessment_id')
                  ->references('uuid')
                  ->on('assessments')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('question_id')
                  ->references('uuid')
                  ->on('questions')
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
        Schema::dropIfExists('answers');
    }
}
