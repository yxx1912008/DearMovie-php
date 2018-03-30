<?php


/**
 * 生成Token
 * @return string
 */
function getToken()
{
    $str = md5(uniqid(md5(microtime(true)), true));  //生成一个不会重复的字符串
    $str = sha1($str + 'cs&%#$$%');  //加密
    return $str;
}

function checkTokens($token, $table)
{
    $res = db::getOneForFields($table, 'time_out', 'token = ?', array($token));
    if (!empty($res)) {
        if (time() - $res['time_out'] > 0) {
            return 90003;  //token长时间未使用而过期，需重新登陆
        }
        /*        $new_time_out = time() + 604800;//604800是七天
                if (db::setWhere($table, array('time_out' => $new_time_out), 'token = ?', array($token))) {
                    return 90001;  //token验证成功，time_out刷新成功，可以获取接口信息
                }*/
    }
    return 90002;  //token错误验证失败
}