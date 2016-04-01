@extends('admin.main')

@section('content')
<div class="row">

    <div class="col-md-6" id="main_dashboard">
        <table class="table">
            <thead>
            <th>id</th>
            <th>openid</th>
            <th>姓名</th>
            <th>账号</th>

            @foreach($user as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->openid}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->wx_name}}</td>
            </tr>
            @endforeach
            </thead>
        </table>
    </div>
</div>

@stop

