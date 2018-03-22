<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


/**
 * 封装Get请求
 * @param $host
 * @param $path
 * @param array $params
 * @return mixed
 */
function requestGet($host, $path, $params = [])
{
    $method = "GET";
    $headers = array();
//    array_push($headers, "Content-Type" . ":" . "application/json; charset=UTF-8");
    $querys = '';
    foreach ($params as $key => $value) {
        $querys .= $key . '=' . $value . '&';
    }
    $url = $host . $path . '?' . $querys;
    $bodys = "";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    if (1 == strpos("$" . $host, "https://")) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    return $result = curl_exec($curl);
}
