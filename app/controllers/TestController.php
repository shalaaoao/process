<?php

class TestController extends BaseController {

	public function test(){

//        $token_url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential';
//        $token_url.= '&appid='.AppID;
//        $token_url.= '&secret='.AppSecret;
//        $json  =https_post($token_url);
//        $result=json_decode($json,true);
//
//        $access_token=$result['access_token'];
//        Cache::put('wx_access_token',$access_token,110);
//        return $access_token;



        $token_url='https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token='.Cache::get('wx_access_token');
        $json  =https_post($token_url);
        $result=json_decode($json,true);

        dd($result);


    }

}
