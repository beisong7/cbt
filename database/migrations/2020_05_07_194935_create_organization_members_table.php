<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->uuid('organization_id')->nullable();
            $table->uuid('candidate_id')->unique();
            $table->boolean('active')->nullable();
            $table->timestamps();

            $table->foreign('organization_id')
                  ->references('uuid')
                  ->on('organizations')
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
        Schema::dropIfExists('organization_members');
    }
}
