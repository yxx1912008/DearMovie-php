<?php

namespace app\member\controller;

use app\member\model\WxUser;
use think\Config;

class Index
{
    public function index()
    {
        return '接口测试成功';
    }


    /**
     * 获取微信用户信息，并保存到数据库
     * 返回数据库用户ID
     * 请求微信后台接口，交换code换取用户openId
     * @param $code
     * @param $nickName
     * @param $avatarUrl
     * @return \think\response\Json
     */
    public function getUserOpenId($code, $nickName, $avatarUrl)
    {
        $wxUser = new WxUser();
        $host = config('GET_OPENID_BASE_URL');
        $appId = config('APP_ID');
        $secret = config('APP_SECRET');
        $path = '?appid=' . $appId . '&secret=' . $secret . '&js_code=' . $code . '&grant_type=authorization_code';
        $result = requestGetNoParam($host, $path, 1);
        if (empty($result->errcode)) {
            $openId = $result->openid;
            $query = WxUser::getByOpenId($openId);
            if (empty($query)) {
                $wxUser['id'] = $this->getUserId();
                $wxUser['open_id'] = $openId;
                $wxUser['nick_name'] = $nickName;
                $wxUser['avatar_url'] = $avatarUrl;
                $wxUser['token'] = getToken();
                $wxUser['time_out'] = date('Y-m-d H:i:s', strtotime('+2 hours'));
                $wxUser->save();
                $save_result = WxUser::getByOpenId($openId);
                if (!empty($save_result)) {
                    $returnData = ['result' => '1', 'id' => $save_result['id'], 'token' => $save_result['token'], ['msg' => '用户注册成功']];
                    return json($returnData);
                }
                $returnData = ['result' => '0', 'msg' => '用户注册失败！'];
                return json($returnData);
            }
            $query['time_out'] = date('Y-m-d H:i:s', strtotime('+2 hours'));
            $query['token'] = getToken();
            $query->isUpdate()->save();
            $returnData = ['result' => '1', 'id' => $query['id'], 'token' => $query['token'], 'msg' => '用户查询成功'];
            return json($returnData);
        }
        $returnData = ['result' => '0', '' => '获取用户信息失败'];
        return json($returnData);
    }

    /**
     * 根据时间戳加盐
     * 生成用户Id
     * @return string
     */
    private function getUserId()
    {
        $salt = config('SALT');
        $time = time();
        $saltWord = $salt . $time;
        $result = md5($saltWord);
        return $result;
    }

    /**
     * 获取吱口令红包
     * @return \think\response\Json
     */
    public function getGiftWordByAli()
    {
        $giftWord = \config('ALIPAY_WORD_GIFT');
        return json(['result' => '1', 'giftWord' => $giftWord, 'msg' => '获取红包口令成功']);
    }


}
