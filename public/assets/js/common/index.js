$(function(){
    //交易管理系统
    $('.process_system_list:first').css('margin-top','41px');

    //循环出各大系统的颜色
    for(var i=0;i<5;i++){
        var circle_color=$('.process_system_circle:eq('+i+')').text();
        $('.process_system_circle:eq('+i+')').css('color',circle_color);
        $('.process_system_circle:eq('+i+')').css('background-color',circle_color);
        $('.process_system_circle:eq('+i+')').css('border-color',circle_color);
    }



})
//获取当前时间

setInterval(function() {
    var mydate=new Date;
    //var now = (new Date()).toLocaleString();
    var hour=mydate.getHours();
    var minute=mydate.getMinutes();
    //如果是个位数，前面增加0
    if(minute.toString().length==1){
        var minute='0'+minute;
    }
    $('#process_time').text(hour+':'+minute);
}, 1000);


$(function(){

    //初始化ajax请求地址
    var ajax_url='http://'+window.location.host+"/day_process_ajax";

    //载入页面时，将之前所有已操作过步骤背景改为灰色
    $.ajax({
        type: "get",
        url: ajax_url,
        dataType: "json",
        asyn:false,
        success:function(now){

            var now_status=now['status'];
            var operate=now['operate'];
            var color=now['color'];
            $.each(operate, function(i,val) {
                //循环新增每个步骤
                $("#process_container ul").append("<li>" + val['operate_name'] + "</li><p></p>");

                //修改进度框
                $("#process_container ul li:eq("+i+")").css('color',color[i]);
                $("#process_container ul li:eq("+i+")").css('background-color','white');
                $("#process_container ul li:eq("+i+")").css('border',"4px solid "+color[i]);

                //民生银行操作字体变小
                if(val['system_id']=='4'){
                    $("#process_container ul li:eq("+i+")").css('font-size','23px');
                }

                if(val['operate_name']=='资金交收确认(与民生银行资金流水核对)'){
                    $("#process_container ul li:eq("+i+")").css('font-size','27px');
                }

                //修改p
                $("#process_container ul p").addClass('process_container_ul_p');
            });

            //删除最后一个p
            $("#process_container ul p:last").remove();

            //index小于now的全部置为已完成
            for(var i=0;i<now_status;i++){
                $('#process_container ul li:eq('+i+')').css('background-color','#C8C8C8');
                $('#process_container ul li:eq('+i+')').css('color','white');
                $('#process_container ul li:eq('+i+')').css('border-color','#C8C8C8');
            }

            //index置为正在做
            //li_color=$('#process_container ul li:eq('+now_status+')').css('border-color');
            $('#process_container ul li:eq('+now_status+')').css('background-color','black');
            $('#process_container ul li:eq('+now_status+')').css('color','white');
        }
    });



    //每3秒更新页面高度，及进度状态
    function refreshOnTime(limit){
        clearInterval(timmer);
        $.ajax({
            type: "get",
            url: ajax_url,
            dataType: "json",
            success:function(now){
                var now_status=now['status'];
                var last_status=now['status']-1;

                //如果当前不是第一步才会执行
                if(now_status!=0){
                    //获取上一步窗口的高度，并将页面定位到这个高度
                    var height=$('#process_container ul li:eq('+last_status+')').offset().top;
                    $(document).scrollTop(height-70);

                    //修改上一步的css
                    $('#process_container ul li:eq('+last_status+')').css('background-color','#C8C8C8');
                    $('#process_container ul li:eq('+last_status+')').css('border','4px solid #C8C8C8');
                    $('#process_container ul li:eq('+last_status+')').css('color','white');
                }

                //修改当前步骤的css
                //var color=$('#process_container ul li:eq('+now_status+')').css('border-color');
                $('#process_container ul li:eq('+now_status+')').css('background-color','black');
                $('#process_container ul li:eq('+now_status+')').css('color','white');


                timmer = setInterval(function(){
                    refreshOnTime(1);
                }, 3000);
            },
            error:function(){
//                            timmer = setInterval(function(){
//                                refreshOnTime(1);
//                            }, 3000);
                alert('error');
            }
        });


    }

    var timmer = setInterval(function(){
        refreshOnTime(1);
    }, 3000);
    //开始执行自己
    //refreshOnTime(1);

})



