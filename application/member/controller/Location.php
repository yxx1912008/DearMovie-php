<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/3/28
 * Time: 9:35
 * 微信用户位置管理
 */

namespace app\member\controller;


class Location
{
    public function index()
    {
        return '接口测试成功';
    }


    /**
     * 根据坐标获取用户所在城市信息
     * @param string $output
     * @param int $pois
     * @param string $location
     * @return \think\response\Json
     */
    public function getUserCity($output = 'json', $pois = 0, $location = '30.28,120.15')
    {
        //拼接请求
        $host = config('BAIDU_MAP_GET_LOCATION_API');
        $ak = config('BAIDU_MAP_AK');
        $path = 'location=' . $location . '&output=' . $output . '&pois=' . $pois . '&ak=' . $ak;
        //设置请求参数 returnGetMsg =1 不在浏览器显示请求代码
        $result = requestGetNoParam($host, $path, 1);
        $status = $result->status;
        if ($status === 0) {
            $city = $result->result->addressComponent->city;
            $city = str_replace('市', '', $city);
            $returnData = ['result' => '1', 'city' => $city, 'msg' => '用户城市信息获取成功'];
            return json($returnData);
        }
        $returnData = ['result' => '0', 'msg' => '查询城市失败'];
        return json($returnData);
    }

}