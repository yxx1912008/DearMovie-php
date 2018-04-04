<?php

namespace app\movie\controller;

use think\Controller;

class Index extends Controller
{
    /**
     * 默认首页
     * @return string
     */
    public function index()
    {
        return json('接口调用成功');
    }


    /**
     * 获取当前城市正在上映电影
     * @param string $city 城市
     * @param int $start 开始行数
     * @param string $count 每页条数
     */
    public function in_theaters($city = '杭州', $start = 0, $count = 5)
    {
        $host = config('douban_api_host');
        $path = config('in_theaters_path');
        $params = ['city' => $city, 'start' => $start, 'count' => $count];
        $result = requestGet($host, $path, $params);
        return $result;
    }

    /**
     * 获取即将上映的电影列表
     * @param int $start 开始
     * @param int $count 每页几条
     * @return \think\response\Json
     */
    public function coming_soon($start = 0, $count = 5)
    {
        $host = config('douban_api_host');
        $path = config('coming_soon');
        $params = ['start' => $start, 'count' => $count];
        $result = requestGet($host, $path, $params);
        return $result;
    }

    /**
     * 获取排名前250名的电影信息
     * @param int $start
     * @param int $count
     * @return \think\response\Json
     */
    public function top250($start = 0, $count = 5)
    {
        $host = config('douban_api_host');
        $path = config('top250');
        $params = ['start' => $start, 'count' => $count];
        $result = requestGet($host, $path, $params);
        return $result;
    }

    /**
     * 搜索指定名称的电影信息
     * @param string $q
     * @param string $tag
     * @param int $start
     * @param int $count
     * @return \think\response\Json
     */
    public function search($q = '', $tag = '', $start = 0, $count = 5)
    {
        $host = config('douban_api_host');
        $path = config('search');
        $params = ['q' => $q, 'tag' => $tag, 'start' => $start, 'count' => $count];
        $result = requestGet($host, $path, $params);
        return $result;
    }


    /**
     * 根据ID获取电影条目信息
     * @param string $id
     * @return \think\response\Json
     */
    public function getSubectById($id = '1764796')
    {
        $host = config('douban_api_host');
        $path = config('subject_id');
        $result = requestGetNoParam($host, $path . $id);
        return $result;
    }

    public function getSubjectPhotos($id)
    {

        echo 'xxx' . $id;

    }


}
