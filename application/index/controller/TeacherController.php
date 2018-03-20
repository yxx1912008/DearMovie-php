<?php
/**
 * Created by PhpStorm.
 * User: yuanxx
 * Date: 2018/3/20
 * Time: 16:11
 * 控制器 teacher
 */

namespace app\index\controller;


use think\Controller;
use \app\index\model\Teachers as TeacherModel;


class TeacherController extends Controller
{

    /**
     * 增加老师
     */
    public function addTeacher()
    {
        $teacher = new TeacherModel();
        /*  $teacher['name'] = '方天';
          $result = $teacher->save();*/
        //批量增加
        $list = [
            ['name' => '蔡文姬'],
            ['name' => '妲己'],
            ['name' => '白棋'],
            ['name' => '艺兴']
        ];
        $teacher->saveAll($list);
    }

    /**
     * 更新老师
     */
    public function updateTeacher($id = 1)
    {
        $teacher = new TeacherModel();
        $teacher['id'] = (int)$id;
        $teacher['name'] = '孙悟空';
        $teacher->isUpdate()->save();
    }

    /**
     * 删除老师
     */
    public function delTeacher()
    {

        $teacher = new TeacherModel();
        $teacher['id'] = 1;
        $teacher->delete();
        echo '操作成功';

    }

    /**
     * 测试查询model
     */
    public function queryTeacher($id = '1')
    {
        $teacher = new TeacherModel();
        /*    $result = $teacher->where('id=16')->select();*/
        //默认的模型查询功能
        $teacher = TeacherModel::get($id);
        echo $teacher['name'] . '<br>';
        $teacher = TeacherModel::getByName('白棋');
        echo $teacher['name'] . '<br>';
        $list = TeacherModel::all();
        foreach ($list as $item) {
            echo $item['name'] . '<br>';
        }
        $arry = TeacherModel::where('id > 21')->select();
        echo '--------------------------------<br>';
        foreach ($arry as $item) {
            echo $item->name;
        }


    }


}