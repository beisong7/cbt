<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('organization_id')->nullable(); //organization uuid
            $table->string('title')->nullable();
            $table->string('global_name')->nullable(); // Assessment, Test, Quiz, Exam
            $table->string('public_key')->unique()->nullable(); // assessment public key - used for public sharing
            $table->text('introduction')->nullable();
            $table->longText('instructions')->nullable();
            $table->string('photo')->nullable();
            $table->string('course_id')->nullable(); //not compulsory
            $table->string('curriculum_item_id')->nullable(); //not compulsory | points to a curriculum Item
            $table->string('mode')->nullable(); //timed, not_timed, timed_expire, timed_begin, timed_begin_expire, begin_expire
            $table->integer('duration')->nullable();//minutes [1hr = 60]
            $table->integer('attempts_allowed')->nullable();// number of attempts if pass conditions are met
            $table->float('pass_percent', 4, 1)->nullable();// percentage to accept assessment as a pass or fail
            $table->integer('questions_allotted')->nullable(); // set number of questions for assessment irrespective of question count
            $table->bigInteger('active_from')->nullable();
            $table->bigInteger('expire_at')->nullable();
            $table->string('type')->nullable(); //public , private
            $table->string('answer_number_mode')->nullable(); //numeric, alphabet, roman
            $table->boolean('published')->nullable();
            $table->bigInteger('publish_time')->nullable();
            $table->boolean('show_score')->nullable();
            $table->boolean('allow_review')->nullable();
            $table->integer('max_candidate')->nullable();
            $table->string('token')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();

            $table->foreign('organization_id')
                  ->references('uuid')
                  ->on('organizations')
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
        Schema::dropIfExists('assessments');
    }
}
