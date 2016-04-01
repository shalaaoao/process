<?php
class Wxservice extends Eloquent{

    //自定义菜单
    public function create_menu_api($jsonmenu){
        $menu_url  = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.Cache::get('wx_access_token');
        $result = https_post($menu_url, $jsonmenu);
        return $result;
    }

}