<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('time_taken')->nullable();
            $table->unsignedBigInteger('target_id');
            $table->text('result')->nullable();
            $table->text('challenge')->nullable();
            $table->date('date_task');
            $table->timestamps();

            //relationship
            $table->foreign('report_id')->references('id')->on('reports');
            $table->foreign('target_id')->references('id')->on('targets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
