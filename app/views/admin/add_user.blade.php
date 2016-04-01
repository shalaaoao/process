@extends('admin.main')

@section('content')
<div class="row">

    <div id="loginModal" class="modal show" style="margin-top:200px;opacity: 1;z-index:5">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close">x</button>
                    <h1 class="text-center text-primary">注册</h1>
                </div>
                <div class="modal-body">
                    <form action="{{Action('admin.do_register')}}" method="post" class="form col-md-12 center-block">
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="account" placeholder="账号">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-lg" name="name" placeholder="姓名">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="pwd" placeholder="登录密码">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control input-lg" name="repwd" placeholder="重复密码">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg btn-block">立刻注册</button>
                        </div>
                        <div>{{isset($error) ? $error : ''}}</div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</div>

@stop

