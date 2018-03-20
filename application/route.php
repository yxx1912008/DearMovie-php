<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | 路由设置
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],

    /* 1.所有路径中包含hello都被定义到hello方法*/
    // 'hello/[:name]' => 'index/hello'

    /*2.定义闭包*/
//    'hello/[:name]' => function ($name = 'yxx') {
//        return 'hello' . $name;
//    }

    /* 3.定义路由器参数 限定 post 或者 get 请求*/
//    'hello/[:name]' => ['index/hello',['method'=>'GET',''=>'html']]


];
