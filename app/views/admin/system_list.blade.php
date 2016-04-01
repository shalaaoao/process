@extends('admin.main')

@section('content')
<div class="row">

    <div class="col-md-6" id="main_dashboard">
        <table class="table">
            <thead>
            <th>id</th>
            <th>系统名称</th>
            <th>颜色</th>

            @foreach($system as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->system_name}}</td>
                <td>{{$v->color}}</td>
                <td>
                    <form action="{{Route('admin.system_list')}}">
                        <input type="color" name="color" value="{{$v->color}}">
                        <input type="hidden" name="id" value="{{$v->id}}">
                        <input type="submit" value="submit" class="btn btn-danger btn-xs change_system_color"/>
                    </form>
                </td>
            </tr>
            @endforeach
            </thead>
        </table>
    </div>
</div>

@stop

