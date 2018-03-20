<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/3/20
 * Time: 16:06
 */

namespace app\index\model;


use think\Model;

class Teachers extends Model
{
    /**
     * @return mixed
     */
    public function getNameAttr($name)
    {
        return '英雄名字：' . $name;
    }


    //类似于Java里面的对象，方便的地方是，直接映射
    protected $table = 'teachers';

}