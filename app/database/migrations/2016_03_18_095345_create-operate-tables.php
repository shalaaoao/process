<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('operate', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('operate_name');
            $table->integer('system_id')->index();
            $table->string('operate_user');
            $table->string('operate_time');
            $table->integer('is_opened')->default('1');
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
		Schema::drop('operate');
	}

}
