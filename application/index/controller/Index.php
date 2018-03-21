<?php

namespace app\index\controller;

//导入controller类库
use app\common\utils\HttpClientUtil;
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
        /*return $this->redirect('http://baidu.com');*/
        /*测试返回json数据*/
        return json($data);
    }


    /**
     * 测试数据库操作
     * 支持切换数据库操作
     */
    public function searchDb()
    {
        $result = Db::execute('select * from students');
        dump($result);
        /*测试使用变量插入*/
        $result_insert = Db::execute('insert into students(name)VALUE(?) ', ['林月如']);
        dump($result_insert);
        /*测试使用命名占位符绑定*/
        $result_namespace = Db::execute('insert into students(name)VALUE (:name)', ['name' => '阿奴']);
        dump($result_namespace);
    }

    /**
     * 测试数据库 查询构造器
     *
     */
    public function searchDbPro()
    {

        //插入记录
        /* $result_insert = Db::table('students')->insert(['name' => '念奴娇']);
         dump($result_insert);*/
        //更新记录
        $result_update = Db::table('students')->where('id', 6)->update(['name' => '酒剑仙']);
        dump($result_update);
        //删除记录
        $result_del = Db::table('students')->where('id', 11)->delete();
        dump($result_del);
        //查询记录
        $list = Db::table('students')->where('id', '6')->select();
        dump($list);
        echo $list[0]['name'];
    }

    /**
     * 测试数据库 操作
     * 使用助手函数
     * 助手函数每次会默认重新连接数据库，尽量减少多次调用
     *
     */
    public function searchDbByHelper()
    {

        //增
        $db = \db('students');
        $db->insert(['name' => '小朱佩奇']);
        //删
        $db->where('id', 12)->delete();
        //改
        $db->where('id', 13)->update(['name' => '小猪乔治']);
        //查
        $list = $db->where('id', 14)->select();
        echo $list[0]['name'];
    }

    /**
     * 测试数据库链式操作
     * 进行复杂的查询
     */
    public function testDbChain()
    {
        $list = Db::table('students')
            ->where('id>10')
            ->order('id', 'desc')
            ->select();
        dump($list);
    }


    /**
     * 测试数据库事务
     */
    public function testWork()
    {
        Db::transaction(function () {
            Db::table('students')->insert(['name' => '蔡文姬1']);
            Db::table('students')->insert(['id' => '17', 'name' => '蔡文姬']);
        });
    }

    /**
     * 批量查询测试
     */
    public function testSql()
    {
        //查询ID大于10 名字类似的
        $list = Db::table('students')
            ->where(
                [
                    'id' => ['>', '10'],
                    'name' => ['like', '%小%']
                ])
            ->select();
        dump($list);
        //测试聚合查询
        $count = Db::table('students')
            ->count();
        echo $count;
        //条件查询
        $arry = Db::table('students')
            ->where('id > :id', ['id' => '10'])
            ->select();
        dump($arry);
    }


    /**
     * 测试页面抓取
     */
    public function testGetPage()
    {
        $host = config('douban_api_host');
        $path = config('in_theaters_path');

        $requester = new HttpClientUtil();
        $requester->requestGet($host);
    }


}


