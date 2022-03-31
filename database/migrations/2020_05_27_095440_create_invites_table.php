<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invites', function (Blueprint $table) {

            $table->bigIncrements('id'); //used for invites to an organization or to an assessment
            $table->uuid('uuid')->unique();
            $table->text('token')->nullable(); //token string
            $table->text('code')->nullable(); //code string
            $table->string('type')->nullable(); //organization || assessment ||
            $table->string('mode')->nullable(); //public || private
            $table->string('email')->nullable();
            $table->boolean('completed')->nullable();
            $table->boolean('current')->nullable();
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
        Schema::dropIfExists('invites');
    }
}
