<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayProcessTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('day_process', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('operate_id')->index();
            $table->integer('is_finished')->default('0');
            $table->string('today_operate_time');
            $table->timestamps();
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('day_process');
	}

}
