<?php

class IndexController extends BaseController {

    //显示用总流程图
	public function index(){
        $operate=Operate::get();
        $system=System::get();
        return View::make('index.index',compact('operate','system'));
    }

    //ajx实时请求操作数据库
    public function day_process_ajax(){
        $time=date('Ymd',time());

        //查询当前跑到哪个流程
        $result=array();
        $result['status']=DayProcess::where('work_day',$time)->where('is_finished','1')->orderby('id','desc')->limit(1)->pluck('operate_id');

        //如果当期一步都未做
        if(!$result['status']){
            $result['status']=0;
        }

        //查询数据库
        $result['operate']=Operate::where('is_opened','1')->get()->toarray();

        //循环operate，查询出颜色
        $result['color']=array();
        foreach($result['operate'] as $v){
            $system=System::find($v['system_id']);
            array_push($result['color'],$system->color);
        }

        return json_encode($result);
    }

    //操作员 操作界面
    public function operate(){
        $operate=Operate::get();

        $time=date('Ymd',time());
        $day_process=DayProcess::where('work_day',$time)->get();
        return View::make('index.operate',compact('operate','day_process'));
    }

    public function do_this_operate(){
        $id=Input::get('id');
        $time=date('Ymd',time());
        $operate_time=date('H:i:s',time());

        //查询操作者id
        $uid=User::where('wx_name',Session::get('account'))->pluck('id');

        //查询此步骤是否已完成
        $is_finished=DayProcess::where('work_day',$time)->where('operate_id',$id)->pluck('is_finished');

        //若操作未做过
        if($is_finished==0){
            $operate_power=Operate::where('id',$id)->pluck('operate_user');

            //若操作者有点此操作权限
            if($operate_power==$uid){
                $result=DayProcess::where('work_day',$time)->where('operate_id',$id)->update(array('is_finished'=>1,'user_id'=>$uid,'today_operate_time'=>$operate_time));
            }else{
                $result=-1;
            }
        }else{
            $result=0;
        }

        return json_encode($result);
    }
}
