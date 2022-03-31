<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('assessment_id')->nullable();
            $table->longText('question')->nullable();
            $table->string('resource_id')->nullable(); //if video or pic or even adio
            $table->integer('minutes_expected')->nullable();
            $table->string('answer_input')->nullable(); //radio, checkbox, field
            $table->timestamps();

            $table->foreign('assessment_id')
                  ->references('uuid')
                  ->on('assessments')
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
        Schema::dropIfExists('questions');
    }
}
