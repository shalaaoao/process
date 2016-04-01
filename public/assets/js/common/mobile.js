var phoneWidth =  parseInt(window.screen.width);
var phoneScale = phoneWidth/640;
var ua = navigator.userAgent;
if(/Android (\d+\.\d+)/.test(ua)){
    var version = parseFloat(RegExp.$1);
    if(version>2.3){
        document.write('<meta name="viewport" content="width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi">');
    }else{
        document.write('<meta name="viewport" content="width=640, target-densitydpi=device-dpi">');
    }
}else{
    document.write('<meta name="viewport" content="width=640, user-scalable=no, target-densitydpi=device-dpi">');
}
var isMobile = {
	Android: function(){ return navigator.userAgent.match(/Android/i) ? 'Android' : false;},
	BlackBerry: function(){ return navigator.userAgent.match(/BlackBerry/i) ? 'BlackBerry' : false;},
	iOS: function(){ return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? 'iOS' : false;},
	Windows: function(){ return navigator.userAgent.match(/IEMobile/i) ? 'Windows' : false;},
	any: function(){ return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());}
};
if(isMobile.any()){
	var phoneWidth =  parseInt(window.screen.width);
	var phoneScale = phoneWidth/640;
	var ua = navigator.userAgent;
	if(/Android (\d+\.\d+)/.test(ua)){
		var version = parseFloat(RegExp.$1);
		if(version>2.3){
			$("<meta>").attr({content: 'width=640, minimum-scale = '+phoneScale+', maximum-scale = '+phoneScale+', target-densitydpi=device-dpi', name: "viewport"}).appendTo("head");
		}else{
			$("<meta>").attr({content: 'width=640, target-densitydpi=device-dpi', name: "viewport"}).appendTo("head");
		}
	}else{
		$("<meta>").attr({content: 'width=640, user-scalable=no, target-densitydpi=device-dpi', name: "viewport"}).appendTo("head");
	}
}