(function( window, undefined ) {
var Jax = {
    strtotime:function(datetime){
        if(datetime){ 
            var tmp_datetime = datetime.replace(/:/g,'-'); 
            tmp_datetime = tmp_datetime.replace(/( |T)/g,'-'); 
            var arr = tmp_datetime.split("-"); 
            var now = new Date(Date.UTC(arr[0],arr[1]-1,arr[2],arr[3]-8,arr[4],arr[5])); 
            return parseInt(now.getTime()); 
         }
    }, 
    get_time_diff:function(time1,time2){
        var time_diff = (strtotime(time1) - strtotime(time2)) /(1000*60);
        if(time_diff>240){
            time_diff = 1440;
        }
        console.log(time_diff);
        return time_diff;
    },
    linkto:function(id,url){
        var alabel = document.getElementById(id);
        alabel.href =url;

        if(document.all) {           
          alabel.click();   
        } else if (document.createEvent) {        
          var ev = document.createEvent('HTMLEvents');   
          ev.initEvent('click', false, true);   
          alabel.dispatchEvent(ev);   
        }   
    },
    loading:function(){
        var SHEIGHT=0;
        if(document.body.scrollTop == 0){
            SHEIGHT = document.documentElement.scrollTop;
        }else{
            SHEIGHT = document.body.scrollTop;
        }

        $('.notification').show();
        $('.notification div.window').css('top', SHEIGHT+200+'px');
        $('.notification div.window').addClass('show');
       
        setTimeout(function(){
            $('.notification div.window').addClass('show');
        },50);
    },
    loaded:function(){
        $('.notification div.window').removeClass('show');
        setTimeout(function(){
            $('.notification').hide();
        },300);
    },
    loaded_delay:function(){
         var loadstatus = setInterval(function(){
               if( $('.notification').css('display') != 'none'){
                   Jax.loaded(); 
               }else{
                  clearInterval(loadstatus);
               }
               
            },10000);
    },
    error:function(){
        alert('请稍后再试~');
    },
    slide:function(obj_dom,css,start_pos,end_pos,ms,callback){
        if(ms <=0 ){
            ms=300;
        }
        eval("obj_dom.style."+css+"=start_pos+'px'");  
        obj_dom.style.display="block";
        var ht =  (new Date).getTime();
        var changeStyle = function (){
            var ht2 = (new Date).getTime();
            var dt = (ht2-ht)/ms; //300ms
            var intervalue = (1.3426*dt*dt-3.5139*dt+3.1729)*dt; //+0.06*Math.sin(dt*30)); //dt [0,1] , intervalue [0,1]
            var step=start_pos *(1-intervalue)+end_pos*intervalue;
            if(ht2-ht>ms){
                step=end_pos;
                if(typeof callback == "function"){
                    callback();
                    return false;
                }
            }else{
                setTimeout(changeStyle,1);
            }
            eval("obj_dom.style."+css+"=step+'px'");  
        } 
        changeStyle();
    },
    css:function(obj_dom,style){
         eval("obj_dom.style."+style+" = window.getComputedStyle(obj_dom,null)."+style);  
         eval("return obj_dom.style."+style);
    },
    set_cookie:function(name,value){
        var Days = 100; 
        var exp = new Date();
        exp.setTime(exp.getTime() + Days*24*60*60*1000);
        document.cookie = name + "="+escape(value)+";expires=" + exp.toGMTString();
    },
    get_cookie:function(name){
        var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
        if(arr != null) return unescape(arr[2]); return null;

    },
    save:function(name,value){
        if(window.localStorage){
            localStorage.setItem(name,value);
        }else{
            Jax.set_cookie(name,value); 
        }
    },
    read:function(name){
        if(window.localStorage){
            return localStorage.getItem(name);
        }else{
            return Jax.get_cookie(name); 
        }
    },
    del_cookie:function(name){
        var exp = new Date();
        exp.setTime(exp.getTime() - 1);
        var cval=Jax.get_cookie(name);
        if(cval!=null) document.cookie= name + "="+cval+";expires="+exp.toGMTString();
    },
    subString:function(str, len, hasDot){  
        var newLength = 0;  
        var newStr = "";  
        var chineseRegex = /[^\x00-\xff]/g;  
        var singleChar = "";  
        var strLength = str.replace(chineseRegex,"**").length;  
        for(var i = 0;i < strLength;i++)  
        {  
            singleChar = str.charAt(i).toString();  
            if(singleChar.match(chineseRegex) != null)  
            {  
                newLength += 2;  
            }      
            else  
            {  
                newLength++;  
            }  
            if(newLength > len)  
            {  
                break;  
            }  
            newStr += singleChar;  
        }  

        if(hasDot && strLength > len)  
        {  
            newStr += "...";  
        }  
        return newStr;  
    },
    bindMsg:function(obj_id){
        var _obj =document.getElementById(obj_id);
        _obj.style.visibility='hidden';
        _obj.style.display='block';
        var obj_way = 0-(parseInt($('#'+obj_id).height() + 50));
        _obj.style.top =obj_way+"px";
        _obj.style.left = (window.innerWidth*2/100)/2 + "px";
        setTimeout(function(){
            $('#overlay').show();
            _obj.style.visibility='visible';
            Jax.slide(_obj,"top",obj_way,70,300,function(){
                Jax.slide(_obj,"top",70,5,50,null);
            });
        },400);
        
    },
    fxoff:function(){
        var judge ={};
        var userAgent= navigator.userAgent.toLowerCase();
        judge.android2x = userAgent.match(/(android 2|android\/2)/g);
        if(judge.android2x) $.fx.off = true;
    },
    checking_userinput:function(){
        var minheight =  window.innerHeight * 95/100;
        $(document).on('resize',function(){
             if( minheight > window.innerHeight  || HIDE_TOOLBAR === true){
                    $('footer').hide();
                }else{
                    $('footer').show();
                }
        });
        
    },
    listening:function(){
        var minheight =  window.innerHeight * 95/100;
        setInterval(function(){
            if( minheight > window.innerHeight  || HIDE_TOOLBAR === true){
                $('footer').hide();
            }else{
                $('footer').show();
            }
        },100);
    }
};
if ( typeof window === "object" && typeof window.document === "object" ) {
    window.Jax = Jax;
    window.HIDE_TOOLBAR = false;
}

})( window );

// 对Date的扩展，将 Date 转化为指定格式的String 
// 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
// 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
// 例子： 
// (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
// (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
Date.prototype.Format = function(fmt){ 
  var o = { 
    "M+" : this.getMonth()+1,                 //月份 
    "d+" : this.getDate(),                    //日 
    "h+" : this.getHours(),                   //小时 
    "m+" : this.getMinutes(),                 //分 
    "s+" : this.getSeconds(),                 //秒 
    "q+" : Math.floor((this.getMonth()+3)/3), //季度 
    "S"  : this.getMilliseconds()             //毫秒 
  }; 
  if(/(y+)/.test(fmt)) 
    fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length)); 
  for(var k in o) 
    if(new RegExp("("+ k +")").test(fmt)) 
  fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length))); 
  return fmt; 
};
Number.prototype.toFixed=function(num){ 
   with(Math)this.NO=round(this.valueOf()*pow(10,num))/pow(10,num); 
   return this.NO;
  // return String(/\./g.exec(this.NO)?this.NO:this.NO+"."+String(Math.pow(10,num)).substr(1,num)); 
} ;
$(function($){
    $("a,button,.router").on(TAP,function(){
        var linkurl = $(this).attr('goto');  
        if(linkurl){
            Jax.loading();
            setTimeout(function(){
                Jax.loaded_delay();
                location.href = linkurl;
            },400);
        }
    });
});
