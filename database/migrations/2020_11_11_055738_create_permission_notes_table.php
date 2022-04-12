<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_notes', function (Blueprint $table) {
            $table->id();
            $table->text('request');
            $table->unsignedBigInteger('staff_id');
            $table->text('hod_recommendation')->nullable();
            $table->unsignedBigInteger('hod_id')->nullable();
            $table->text('hr_recommendation')->nullable();
            $table->unsignedBigInteger('hr_id')->nullable();
            // $table->date('application_date'); //but we can use created at
            $table->date('hod_comment_date')->nullable();
            $table->date('hr_comment_date')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_to')->nullable();
            $table->string('status')->nullable(); //read | not read by staff 5=>accept 6=>reject
            $table->timestamps();

            //relationship 
            $table->foreign('staff_id')->references('id')->on('users');
            $table->foreign('hod_id')->references('id')->on('users');
            $table->foreign('hr_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_notes');
    }
}
