<?php

namespace app\index\controller;

//导入controller类库
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index($name = 'yxx')
    {
        return '<span style="color: #880000">  十年磨一剑</span>' . $name;
    }

    /**
     * hello test
     * @param string $name
     * @param string $id
     * @return string
     */
    public function hello($name = 'yxx', $id = '001')
    {
        return 'Hello World!';
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

    /**
     * 测试读取数据库
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function readDataBase()
    {

        $data = Db::name('students')->find();
        $this->assign('result', $data);
        return $this->fetch();
    }

    /**
     * 测试 requst 请求对象
     * @param string $name
     * @return string
     */
    public function testRequestObj($name = 'yxx')
    {
        $request = Request::instance();
        echo $request->ip() . '<br>';
        echo $request->domain() . '<br>';
        echo 'url:' . $request->url() . '<br>';
        /*简化调用*/
        echo $this->request->url() . '<br>';
        $arr = $this->request->header();
        dump($arr) . '<br>';
        /*取出键值对的值*/
        echo $arr['loginchannel'] . '<br>';
        /*取出请求中带的参数*/
        echo $this->request->param()['num'] . '<br>';
        /*使用助手简化操作 取出请求中的参数*/
        echo input('id') . '<br>';
        /*取出照片*/
        dump($this->request->file('images'));
        return 'hello,' . $name . '!';
    }

    /**
     * respongs 可以返回 json jsonp
     * 可以重定向 可以渲染模板输出
     */
    public function testResObj()
    {
        $data = ['id' => '001', 'name' => 'yuanxx'];
        return $this->redirect('http://baidu.com');

    }


    public function searchDb()
    {
        $result = Db::execute('select * from students');
        dump($result);
    }
}


