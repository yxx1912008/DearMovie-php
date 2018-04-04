<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/4/4
 * Time: 14:31
 * 用户收藏相关
 */

namespace app\member\controller;


use app\member\model\UserFavorite;
use app\member\model\WxUser;
use think\Request;

class Favorite
{
    public function index()
    {
        return '接口测试成功';
    }

    /**
     * 增加电影收藏
     * @param Request $request
     * @param $movieId
     * @return \think\response\Json
     * @throws \think\exception\DbException
     */
    public function addFavorite(Request $request, $movieId)
    {
        if (empty($movieId)) {
            return json(['result' => '1', 'msg' => '电影Id不能为空']);
        }
        //验证用户token
        $token = $request->header('token');
        if (empty($token)) {
            return json(['result' => '1', 'msg' => 'Token验证失败']);
        }
        $token_result = checkTokens($token, 'wx_user');
        if ($token_result != 90001) {
            return json(['result' => '1', 'msg' => 'Token验证失败']);
        }
        $wxUser = WxUser::getByToken($token);
        if (empty($wxUser)) {
            return json(['result' => '1', 'msg' => 'Token验证失败']);
        }
        if ($this->isFavorite($wxUser['id'], $movieId)) {
            return json(['result' => '0', 'msg' => '用户已经收藏该电影']);
        }
        $userFavorite = new UserFavorite();
        $userFavorite['user_id'] = $wxUser['id'];
        $userFavorite['movie_id'] = $movieId;
        $userFavorite->save();
        return json(['result' => '0', 'msg' => '添加收藏成功']);
    }


    /**
     * 用户是否已经收藏本电影
     * @param $id
     * @param $movieId
     * @return bool
     * @throws \think\exception\DbException
     */
    private function isFavorite($id, $movieId)
    {
        $userFavorite = UserFavorite::get(['id' => $id, 'movie_id' => $movieId]);
        if (empty($userFavorite)) {
            return false;
        }
        return true;
    }

}