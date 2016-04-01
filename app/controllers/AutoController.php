<?php

class AutoController extends BaseController {

     public function create_day_process(){
         $time=date('Ymd',time());

         //查询dayprocess是否有今日数据
         if(!DayProcess::where('work_day',$time)->first()){
             //查询operate表中的记录条数
             $operate_num=Operate::where('is_opened','1')->count();
             for($i=1;$i<=$operate_num;$i++){
                 $dayprocess=new DayProcess();
                 $dayprocess->operate_id=$i;
                 $dayprocess->work_day=$time;
                 $dayprocess->save();
             }

             echo $time.'数据更新成功,共'.$operate_num;
         }else{
             echo '已存在'.$time.'数据,无需重复新增';
         }

     }

}
