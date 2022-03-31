<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->unique();
            $table->uuid('group_id')->nullable();
            $table->uuid('candidate_id')->unique();
            $table->boolean('active')->nullable();
            $table->timestamps();

            $table->foreign('group_id')
                  ->references('uuid')
                  ->on('groups')
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
        Schema::dropIfExists('group_members');
    }
}
