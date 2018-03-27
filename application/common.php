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
 * 封装Get请求(baohancanshu)
 * @param $host
 * @param $path
 * @param array $params
 * @return mixed
 */
function requestGet($host, $path, $params = [])
{
    $method = "GET";
//    $headers = array();
//    array_push($headers, "Content-Type" . ":" . "application/json; charset=UTF-8");
    $querys = '';
    if (!empty($params)) {
        foreach ($params as $key => $value) {
            $querys .= $key . '=' . $value . '&';
        }
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

/**
 * 无参数Get请求
 * @param $host
 * @param $path
 * @param int $returnGetMsg
 * @return bool|mixed
 */
function requestGetNoParam($host, $path, $returnGetMsg = 0)
{
    $method = "GET";
    $url = $host . $path;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    //curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    //是否将请求的内容显示在浏览器（常用）
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, $returnGetMsg);
    if (1 == strpos("$" . $host, "https://")) {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }
    $result = curl_exec($curl);
    if ($result === false) {
        return false;
    }
    $result = json_decode($result);
    curl_close($curl);
    return $result;
}

