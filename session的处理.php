<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
class HelloController extends  Controller{
    public  function  actionIndex(){
        //调用SESSION
       $session = \YII::$app->session;
       //SESSION打开 ->是使用对象 []是使用数组来使用
       $session->open();
       //对session设置内容
       $session->set('user','张学友');
       $session['user']='张学友';
       //查找session值 首先在php.in 找到session.save_path 可以找到生成的session
        //取出session数据 这里是user的数据
        echo $session->get('user');
        echo $session['user'];
        //删除session数据
        $session->remove('user');
        unset($session['user']);

    }
}