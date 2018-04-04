<?php


/**
 * 生成Token
 * @return string
 */
function getToken()
{
    $str = md5(uniqid(md5(microtime(true)), true));  //生成一个不会重复的字符串
    $str = sha1($str . 'cs&%#$$%');  //加密
    return $str;
}

/**
 * 校验token的正确性
 * @param $token
 * @param $table
 * @return int
 */
function checkTokens($token)
{
    $result = \app\member\model\WxUser::getByToken($token);
    if (!empty($result)) {
        if ((time() - strtotime($result['time_out'])) > 0) {
            return 90003;  //token长时间未使用而过期，需重新登陆
        }
        return 90001;//验证成功
    }
    return 90002;  //token错误验证失败
}