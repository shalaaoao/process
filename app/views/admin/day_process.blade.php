@extends('admin.main')

@section('content')
<div class="row">

    <div class="col-md-9" id="main_dashboard">
        <table class="table">
            <thead>
            <th>序号</th>
            <th>操作名称</th>
            <th>是否已完成</th>
            <th>操作者</th>
            <th>今日操作时间</th>
            <tr>
                <th colspan="6" style="text-align:center;">工作日:{{$process[0]->work_day}}</th>
            </tr>
            @foreach($process as $k=>$v)
            <tr>
                <td>{{$k+1}}</td>
                <td>
                    <?php
                        $operate_id=$v->operate_id;
                        $operate=Operate::find($operate_id);
                    ?>
                    {{$operate->operate_name}}
                </td>
                <td>
                    @if($v->is_finished)
                        是
                    @else
                        否
                    @endif
                </td>
                <td>
                    <?php
                        $user_id=$v->user_id;
                        if($user_id!=0){
                            $user=User::find($user_id);
                            print_r($user->name);
                        }else{
                            print_r('--');
                        }
                    ?>
                </td>
                <td>
                    @if($v->today_operate_time)
                        {{$v->today_operate_time}}
                    @else
                        --
                    @endif
                </td>
            </tr>
            @endforeach
            </thead>
        </table>
    </div>
</div>












@stop

