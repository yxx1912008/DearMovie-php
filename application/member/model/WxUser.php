<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/3/26
 * Time: 17:16
 * 微信用户对象
 */

namespace app\member\model;


use think\Model;

class WxUser extends Model
{
    protected $table = 'wx_user';
    //自动时间戳
    protected $autoWriteTimestamp = 'timestamp';
}