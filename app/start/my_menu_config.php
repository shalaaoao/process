<?php

//绑定当前路由名 菜单可以显示active
View::composer('admin.sidebar', function($view) {
    $route_name = Route::currentRouteName();
    $menu_config_json = '{
            "dashboard":{
                "pages":["admin.dashboard"]
             },
             "system_list":{
                "pages":["admin.system_list"]
             },
              "operate_list":{
                "pages":["admin.operate_list"]
             },
             "user":{
                "items":{
                    "operate_user":{"pages":[
                        "admin.operate_user"
                        ]},
                    "add_user":{"pages":[
                        "admin.add_user"
                        ]}
                    }
            },
             "day_process":{
                "pages":["admin.day_process"]
             }
        }';
    $menu_config = json_decode($menu_config_json,true);

    foreach( $menu_config as $_name => $first ){
        if( isset( $first['pages'] ) ){
            $menu[$_name] = in_array( $route_name, $first['pages'] );
        }else{
            $menu[$_name] = false;
            foreach( $first["items"] as $_name2 => $second ){
                $menu[$_name2] = in_array( $route_name, $second['pages'] );
                $menu[$_name] = ( $menu[$_name] || $menu[$_name2] );
            }
        }
    }
    $view->with('menu', $menu);
    $view->with('route_name', $route_name);
});
