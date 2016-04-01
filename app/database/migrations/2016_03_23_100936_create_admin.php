<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('username');
			$table->string('password');
			$table->integer('role'); //后台管理员登录权限
			$table->string('remember_token');
		});

		//创建后台管理员用户
		$admin = new Admin;
		$admin->username = 'fundfcs';
		$admin->password = Hash::make('fund1234');
		$admin->role     = 0;
		$admin->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admins');
	}

}

