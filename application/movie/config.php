<?php
//配置文件
return [
    //豆瓣api的host地址
    'douban_api_host' => 'https://api.douban.com',

    //正在上映
    'in_theaters_path' => '/v2/movie/in_theaters',

    //即将上映的电影
    'coming_soon' => '/v2/movie/coming_soon',

    //排名前250名的电影
    'top250' => '/v2/movie/top250',

    //关键字搜索电影
    'search' => '/v2/movie/search',

    //电影条目信息
    'subject_id' => '/v2/movie/subject/',

    //电影条目剧照
    'subject_photos' => '/v2/movie/subject/'


];