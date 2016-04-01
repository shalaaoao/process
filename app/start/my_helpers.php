<?php

	function h_get_cur_url(){
	    return urlencode(Route::getCurrentRequest()->url());
	}

	//http请求
	function https_post($url,$data=null){
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_SSLVERSION, 1);
	    curl_setopt($curl, CURLOPT_URL, $url); 
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	    if (!empty($data)){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		}
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    $result = curl_exec($curl);
	    if (curl_errno($curl)) {
	       return 'Errno'.curl_error($curl);
	    }
	    curl_close($curl);
	    return $result;
	}

	//本周开始时间
	function h_curr_week_begin(){
		if(date('w') == 0){
			$data = 7;
		}else{
			$data = date('w');
		}
		$week_begin = mktime(0, 0, 0,date("m"),date("d")-$data+1,date("Y"));
		return date('m/d',$week_begin);
	}

	//本周结束时间 
	function h_curr_week_end(){
		if(date('w') == 0){
			$data = 7;
		}else{
			$data = date('w');
		}
		$week_end = mktime(23,59,59,date("m"),date("d")-$data+7,date("Y"));
		return date('m/d',$week_end);
	}

	function base62_encode($data){
		//global $base62;
		$base62str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$data = strval($data);
		$base62 = str_split($base62str);
		$len = strlen($data);
		$i = 0;
		$tmpArr = array();
		while($i<$len){
			$val = $data[$i];
			$tmp = str_pad(decbin(ord($data[$i])),8,'0',STR_PAD_LEFT );
			$temp = str_split($tmp,4);
			$tmpArr = array_merge($tmpArr,$temp);
			++$i;
		}
		$result = '';
		$i = 0;
		foreach($tmpArr as $arr){
			$temp = bindec($arr)*4+$i%2;
			$result .= $base62[$temp];
			++$i;
		}
		return $result;
	}

	function base62_decode($str) {
	    $base62str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $base62 = str_split($base62str);
	    $str = strval($str);
	    $res = "";
	    $tempstr = "";
	    foreach(str_split($str) as $k=>$val){
	        foreach($base62 as $key=>$item){
	            if($val == $item){
	                $tmp = str_pad(decbin(($key - $key%2)/4),4,'0',STR_PAD_LEFT);
	            }
	        }
	        if( $tempstr ){
	             $res .= chr(bindec($tempstr.$tmp)); 
	             $tempstr = "";
	        }else{
	            $tempstr = $tmp;
	        }
	    }
	    return $res;
	}
