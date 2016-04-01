@extends('admin.main')

@section('content')
<div class="row">

    <div class="col-md-9" id="main_dashboard">
        <table class="table">
            <thead>
            <th>id</th>
            <th>操作名称</th>
            <th>所属系统</th>
            <th>操作人员</th>
            <th>每日操作时间</th>
            <th>是否启用</th>

            @foreach($operate as $v)
            <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->operate_name}}</td>
                <td>
                    <?php $system=System::find($v->system_id)?>
                    {{$system->system_name}}
                </td>
                <td>
                    <?php
                        $userid=User::find($v->operate_user);
                        print_r($userid->name);
                    ?>
                </td>
                <td>{{$v->operate_time}}</td>
                <td>
                    <?php
                        if($v->is_opened==1){
                            echo "<a href=".Route('admin.operate_list')."?id=".$v->id."&is_opened=".$v->is_opened."><div class='btn btn-danger btn-xs'>点击关闭</div></a>";
                        }else{
                            echo "<a href=".Route('admin.operate_list')."?id=".$v->id."&is_opened=".$v->is_opened."><div class='btn btn-info btn-xs'>点击开启</div></a>";
                        }
                    ?>

                </td>
            </tr>
            @endforeach
            </thead>
        </table>
    </div>
</div>

@stop

