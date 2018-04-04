<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/4/4
 * Time: 14:39
 * 用户电影收藏
 */

namespace app\member\model;


use think\Model;

class UserFavorite extends Model
{
    protected $table = 'user_favorite';
    //自动时间戳
    protected $autoWriteTimestamp = 'timestamp';
}