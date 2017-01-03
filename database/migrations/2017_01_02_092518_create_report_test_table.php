<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_test', function (Blueprint $table) {
            $table->integer('report_id')->unsigned()->nullable();
            $table->foreign('report_id')->references('id')->on('user_reports')
                ->onDelete('cascade');
            $table->integer('test_id')->unsigned()->nullable();
            $table->foreign('test_id')->references('id')->on('test')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report_test');
    }
}
