<?php

namespace app\index\controller;

//导入controller类库
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index($name = 'yxx')
    {
        return '<span style="color: #880000">  十年磨一剑</span>' . $name;
    }

    /** 测试方法
     * @url:index.php/index/test
     * @return string
     */
    public function test()
    {
        return '测试方法';
    }


    /**
     * 测试模板渲染
     * @param string $name
     * @return mixed
     */
    public function testTemplate($name = 'yxx')
    {
        $this->assign('name', $name);
        return $this->fetch();
    }


    public  function  readDataBase(){

        $data=Db::name('students')->find();
        $this->assign('result',$data);
        return $this->fetch();
    }


}


