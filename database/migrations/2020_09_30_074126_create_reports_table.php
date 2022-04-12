<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('date');
            $table->string('time_sent')->nullable();
            $table->boolean('status')->nullable();// late(0), on time(1)
            $table->integer('status_comment')->nullable();// sent(0),  problem(1) , all report(2)
            $table->unsignedBigInteger('report_type_id')->nullable();
            $table->unsignedBigInteger('approval_id')->nullable();
            $table->boolean('approval_status')->nullable();// approved(0), not approvedme(1)
            $table->string('reporting_time')->nullable();            
            $table->timestamps();

            //relationship
            $table->foreign('report_type_id')->references('id')->on('report_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('approval_id')->references('id')->on('approvals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
