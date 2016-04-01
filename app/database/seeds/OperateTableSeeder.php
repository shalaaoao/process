<?php

class OperateTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('operate')->insert([
            ['operate_name'=>'深证通接收行情文件','system_id'=>'3','operate_user'=>'','operate_time'=>'09:15:00'],
            ['operate_name'=>'日初始化','system_id'=>'1','operate_user'=>'','operate_time'=>'09:15:01'],
            ['operate_name'=>'接收行情','system_id'=>'1','operate_user'=>'','operate_time'=>'09:20:00'],
            ['operate_name'=>'启动交易','system_id'=>'1','operate_user'=>'','operate_time'=>'09:20:01'],
            ['operate_name'=>'网银定投扣款','system_id'=>'1','operate_user'=>'','operate_time'=>'09:20:02'],
            ['operate_name'=>'检查T-1日非正常交易（如撤单）','system_id'=>'1','operate_user'=>'','operate_time'=>'09:30:00'],
            ['operate_name'=>'民生商户平台上传liqudate文件','system_id'=>'4','operate_user'=>'','operate_time'=>'10:20:00'],
            ['operate_name'=>'深证通接收确认文件','system_id'=>'3','operate_user'=>'','operate_time'=>'13:30:00'],
            ['operate_name'=>'日终确认数据预清算','system_id'=>'1','operate_user'=>'','operate_time'=>'13:30:01'],
            ['operate_name'=>'日初数据导入','system_id'=>'2','operate_user'=>'','operate_time'=>'14:00:00'],
            ['operate_name'=>'监管行划款二次导出','system_id'=>'2','operate_user'=>'','operate_time'=>'14:00:01'],
            ['operate_name'=>'网银资金对账','system_id'=>'1','operate_user'=>'','operate_time'=>'15:25:00'],
            ['operate_name'=>'批量修改申请日期','system_id'=>'1','operate_user'=>'','operate_time'=>'15:30:00'],
            ['operate_name'=>'停止柜台交易','system_id'=>'1','operate_user'=>'','operate_time'=>'15:30:01'],
            ['operate_name'=>'处理前备份','system_id'=>'1','operate_user'=>'','operate_time'=>'15:40:00'],
            ['operate_name'=>'交易预处理','system_id'=>'1','operate_user'=>'','operate_time'=>'15:40:01'],
            ['operate_name'=>'导出申请数据','system_id'=>'1','operate_user'=>'','operate_time'=>'15:40:02'],
            ['operate_name'=>'处理确认数据','system_id'=>'1','operate_user'=>'','operate_time'=>'15:40:03'],
            ['operate_name'=>'数据汇总','system_id'=>'1','operate_user'=>'','operate_time'=>'15:40:04'],
            ['operate_name'=>'深证通上传申请文件','system_id'=>'3','operate_user'=>'','operate_time'=>'15:50:00'],
            ['operate_name'=>'日终数据导入','system_id'=>'2','operate_user'=>'','operate_time'=>'16:00:00'],
            ['operate_name'=>'民生账户绑定','system_id'=>'2','operate_user'=>'','operate_time'=>'16:10:00'],
            ['operate_name'=>'民生商户平台确认账户绑定情况','system_id'=>'4','operate_user'=>'','operate_time'=>'16:20:00'],
            ['operate_name'=>'生成划款指令','system_id'=>'2','operate_user'=>'','operate_time'=>'16:30:00'],
            ['operate_name'=>'划款指令复核','system_id'=>'2','operate_user'=>'','operate_time'=>'16:40:00'],
            ['operate_name'=>'资金交收确认(与民生银行资金流水核对)','system_id'=>'2','operate_user'=>'','operate_time'=>'16:50:00'],
            ['operate_name'=>'数据备份','system_id'=>'2','operate_user'=>'','operate_time'=>'17:00:00'],
            ['operate_name'=>'监管行划款一次导出','system_id'=>'2','operate_user'=>'','operate_time'=>'17:10:01'],
            ['operate_name'=>'数据中心销售数据处理模块','system_id'=>'5','operate_user'=>'','operate_time'=>'17:20:00'],
            ['operate_name'=>'民生商户平台上传T+1日return文件','system_id'=>'4','operate_user'=>'','operate_time'=>'18:00:00'],
            ['operate_name'=>'民生商户平台上传J01、J02、Confirm04、divi06文件','system_id'=>'4','operate_user'=>'','operate_time'=>'18:00:01'],

        ]);
	}
}
