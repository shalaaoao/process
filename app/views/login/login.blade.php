@extends('layout.header')
@section('content')
    <div id="loginModal" class="modal show" style="margin-top:200px;opacity: 1;z-index:5">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close">x</button>
                    <h1 class="text-center text-primary">登录</h1>
                </div>
                <div class="modal-body">
                    <form action="{{Action('login.do_login')}}" method="post" class="form col-md-12 center-block">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="account" placeholder="账号">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="pwd" placeholder="登录密码">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block">立刻登录</button>
                            <span onclick="alert('忘记密码，请联系管理员！')"><a href="#">找回密码</a></span>
                            <span><a href="#" class="pull-right" onclick="alert('注册，请联系管理员！')">注册</a></span>
                        </div>
                        <div>{{isset($error) ? $error : ''}}</div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

@stop