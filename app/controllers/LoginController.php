<?php

class LoginController extends BaseController {

	public function login(){
       return View::make('login.login');
    }

    public function do_login(){
        $account=Input::get('account');
        $pwd=Input::get('pwd');


        if(Hash::check($pwd,User::where('wx_name',$account)->pluck('password'))){
            Session::put('account',$account);

            //登录成功，跳转至操作界面
            $operate=Operate::get();
            $time=date('Ymd',time());
            $day_process=DayProcess::where('work_day',$time)->get();
            return Redirect::to('operate')->with(compact('operate','day_process'));
        }else{
            return Redirect::to('login')->with('error','账号或密码错误');
        }
    }
}
