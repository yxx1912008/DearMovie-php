<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/3/21
 * Time: 14:11
 * 小鹿影音 微信端配置文件
 */

namespace app;


interface imovieconfig
{
    const app_name = '小鹿影音';
    //豆瓣基础请求地址
    const base_douban_host = 'https://api.douban.com/v2/movie/in_theaters';
    //正在上映
    const in_theaters_movie_url = '';
}