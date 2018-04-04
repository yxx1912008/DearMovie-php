<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/4/4
 * Time: 14:31
 * 用户收藏相关
 */

namespace app\member\controller;


use think\Request;

class Favorite
{
    public function index()
    {
        return '接口测试成功';
    }


    public function addFavorite(Request $request)
    {
        //验证用户token
        $token = $request->header('token');
        $token_result = checkTokens($token, 'wx_user');
        if ($token_result != 90001) {
return json(['result'=>'1',''=>'',''=>'']);
        }

        echo $token_result;
    }

}