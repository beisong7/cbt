<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->uuid('organization_id')->nullable();
            $table->uuid('staff_id');
            $table->boolean('active')->nullable();
            $table->boolean('owner')->nullable(); // owner of the organization
            $table->integer('who')->nullable(); // from 0 - 4[1=staff, 2 = admin, 3 = admin-manager 4 = super-admin] 0 = security
            $table->string('role_id')->nullable(); // role in the organization
            $table->boolean('creator')->nullable();// creator of the organization
            $table->boolean('current')->nullable();// current focused organization
            $table->bigInteger('last_accessed')->nullable();// last accessed time - we can ignore for now
            $table->timestamps();

            $table->foreign('organization_id')
                  ->references('uuid')
                  ->on('organizations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('staff_id')
                  ->references('uuid')
                  ->on('staff')
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
        Schema::dropIfExists('organization_staff');
    }
}
