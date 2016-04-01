@extends('layout.header')
@section('content')

    <script src="/assets/js/common/index.js" type="text/javascript"></script>

    <!--日常流程操作-->
    <div id="process_all">
        <div id="process_container">
            <ul>

            </ul>
        </div>

        <!--当前时间-->
        <div id="process_time"></div>

        <!--各操作系统-->
        <div id="process_system">
            @foreach($system as $v)
                <div class="process_system_list">
                    <div class="process_system_circle system_jygl ">{{$v->color}}</div>
                    <div class="process_system_word">{{$v->system_name}}</div>
                </div>
            @endforeach
        </div>
    </div>

@stop