<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayProcessTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('day_process', function(Blueprint $table)
        {
            $table->string('work_day')->after('today_operate_time');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('day_process', function(Blueprint $table)
        {
            $table->dropColumn('work_day');
        });
	}

}
