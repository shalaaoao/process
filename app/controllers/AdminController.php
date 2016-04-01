<?php

class AdminController extends \BaseController {

    public function login(){
    	return View::make('admin.login');
    }

    public function do_login() {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(array('username' => $username, 'password' => $password)))
        {
            return Redirect::intended('admin');
        }else{
            return Redirect::action('admin.login');
        }
    }
    
    public function logout() {
        Auth::logout(1);
        return Redirect::action('admin.login');
    }

    public function index(){
        return View::make('admin.index');
    }

    //系统列表
    public function system_list(){

        if(Input::get('color')){
            $change=System::find(Input::get('id'));
            $change->color=Input::get('color');
            $change->save();
        }

        $system=System::get();
        return View::make('admin.system_list',compact('system'));
    }

    //操作列表
    public function operate_list(){
        $id=Input::get('id','0');

        if($id!=0){
            $is_opened=Input::get('is_opened');
            if($is_opened==0){
                $is_opened=1;
            }else{
                $is_opened=0;
            }

            $operate=Operate::find($id);
            $operate->is_opened=$is_opened;
            $operate->save();
        }

        $operate=Operate::get();
        return View::make('admin.operate_list',compact('operate'));
    }

    //操作员列表
    public function operate_user(){
        $user=User::get();
        return View::make('admin.operate_user',compact('user'));
    }

    //今日操作列表
    public function day_process(){
        $time=date('Ymd',time());

        $process=DayProcess::where('work_day',$time)->get();
        return View::make('admin.day_process',compact('process'));
    }

    //注册页面
    public function add_user(){
        return View::make('admin.add_user');
    }

    //注册
    public function do_register(){
        $account=Input::get('account');
        $name=Input::get('name');
        $pwd=Input::get('pwd');
        $repwd=Input::get('repwd');

        //两次密码不相同，返回报错
        if($pwd!=$repwd){
            return View::make('admin.add_user')->with('error','两次密码输入不同');
        }else{
            $user = User::create(array('name' => $name));
            $user->wx_name=$account;
            $user->password=Hash::make($pwd);
            $result=$user->save();

            //插入成功，跳转至列表页
            if($result==1){
                $user=User::get();
                return View::make('admin.operate_user',compact('user'));
            }else{
                return View::make('admin.add_user')->with('error','输入信息有误');
            }
        }
    }
}


















