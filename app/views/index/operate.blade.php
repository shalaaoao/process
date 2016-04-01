@extends('layout.header')
@section('content')
    <style>
        #process_container ul li{
            width:700px;
            height:250px;
            margin:0px auto;
            font-size:48px;
            border:8px solid slategray;
            padding:0px 65px 0px 65px;
        }
    </style>




    <!--日常流程操作-->
    <div id="process_all" >
        <div id="process_container" style="margin:0px auto;width:800px;">
            <ul >
                @foreach($operate as $k=>$v)
                    <li>{{$v->operate_name}}</li>
                    <span style="display:none">{{$day_process[$k]['is_finished']}}</span>
                    <p class="process_container_ul_p"></p>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        $("#process_container ul li").each(function(i,val){
            var id=i+1;

            //获取li长度，若<11修改padding-top
            var length=$(this).text().length;
            if(length<11){
                $(this).css('padding-top','90px');
            }else{
                $(this).css('padding-top','60px');
            }

            //获取li后面的span（是否已操作,若是修改颜色）
            var is_finished= $(this).next();
            if(is_finished.text()==1){
                $(this).css('background-color','black').css('color','white');
            }

            //点击li,修改颜色,并ajax
            $(this).click(function(){

                var last_id=i-1;
                var prev_li=$(this).prevAll('li');
                var prev_color=prev_li.eq(0).css('background-color');

                //若上一步已完成，或这是第一步，则可以操作
                if(prev_color=='rgb(0, 0, 0)'||last_id==-1){
                    $.ajax({
                        type: "get",
                        url: "{{Action('do_this_operate')}}",
                        data:"id="+id,
                        dataType: "json",
                        success:function(result){
                            if(result==0){
                                alert('不能重复选中');
                            }else if(result==-1){
                                alert('您没有此操作权限');
                            }else{
                                var r=confirm("确定已经完成了吗？")
                                if(r==false){
                                    return false;
                                }

                                $("#process_container ul li:eq("+i+")").css('background-color','black').css('color','white');
                                alert('操作成功');
                            }
                        }
                    })
                }else{
                    alert('上面还有步骤没有完成哦！！！');
                }

            })
        })


    </script>

@stop

