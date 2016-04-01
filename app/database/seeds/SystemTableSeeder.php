<?php

class SystemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('system')->insert([
            ['system_name'=>'交易管理系统','color'=>'#FF7D6D'],
            ['system_name'=>'资金清算系统','color'=>'#5DD0B3'],
            ['system_name'=>'深证通','color'=>'#FFA648'],
            ['system_name'=>'民生银行','color'=>'#76C7F6'],
            ['system_name'=>'数据中心','color'=>'#899FF4'],


        ]);
	}
}
