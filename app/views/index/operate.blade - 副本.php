@extends('layout.header')
@section('content')
    <style>
        #process_container ul li{
            width:700px;
            margin:0px auto;
            font-size:48px;
        }
    </style>

    <script>

        $(function() {

            //初始化ajax请求地址
            var ajax_url = 'http://' + window.location.host + "/day_process_ajax";

            //载入页面时，将之前所有已操作过步骤背景改为灰色
            $.ajax({
                type: "get",
                url: ajax_url,
                dataType: "json",
                asyn: true,
                success: function (now) {
                    var now_status = now['status'];
                    var operate = now['operate'];
                    var color = now['color'];
                    $.each(operate, function (i, val) {
                        //循环新增每个步骤
                        $("#process_container ul").append("<li>" + val['operate_name'] + "</li><p></p>");

                        //修改进度框
                        $("#process_container ul li:eq(" + i + ")").css('color', color[i]);
                        $("#process_container ul li:eq(" + i + ")").css('background-color', 'white');
                        $("#process_container ul li:eq(" + i + ")").css('border', "8px solid " + color[i]);

                        //民生银行操作字体变小
                        if (val['system_id'] == '4') {
                            $("#process_container ul li:eq(" + i + ")").css('font-size', '30px');
                        }

                        if (val['operate_name'] == '资金交收确认(与民生银行资金流水核对)') {
                            $("#process_container ul li:eq(" + i + ")").css('font-size', '30px');
                        }

                        //修改p
                        $("#process_container ul p").addClass('process_container_ul_p');
                    });

                    //删除最后一个p
                    $("#process_container ul p:last").remove();

                    //index小于now的全部置为已完成
                    for (var i = 0; i < now_status; i++) {
                        $('#process_container ul li:eq(' + i + ')').css('background-color', '#C8C8C8');
                        $('#process_container ul li:eq(' + i + ')').css('color', 'white');
                        $('#process_container ul li:eq(' + i + ')').css('border-color', '#C8C8C8');
                    }

                    //index置为正在做
                    color = $('#process_container ul li:eq(' + now_status + ')').css('border-color');
                    $('#process_container ul li:eq(' + now_status + ')').css('background-color', color);
                    $('#process_container ul li:eq(' + now_status + ')').css('color', 'white');
                }
            })




        })
    </script>


    <!--日常流程操作-->
    <div id="process_all" >
        <div id="process_container" style="margin:0px auto;width:800px;">
            <ul >

            </ul>
        </div>


        <script>
            $(function(){
                console.log($.parser.parse($('#process_container ul li').html()));

            })
        </script>
@stop