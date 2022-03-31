<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->uuid('organization_id')->nullable();
            $table->uuid('staff_id')->nullable();
            $table->uuid('invite_id')->nullable();
            $table->boolean('confirm')->nullable();
            $table->boolean('handled')->nullable();
            $table->string('action')->nullable();
            $table->timestamps();

//            $table->foreign('organization_id')
//                ->references('uuid')
//                ->on('organizations')//organizations
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//
//            $table->foreign('staff_id')
//                ->references('uuid')
//                ->on('staffs')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
//
//            $table->foreign('invite_id')
//                ->references('uuid')
//                ->on('invites')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenders');
    }
}
