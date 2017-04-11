<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
//使用yii的cookie处理
use yii\web\cookie;
class HelloController extends  Controller{
    public  function  actionIndex(){
      //调用cookies
        $cookies = \YII::$app->response->cookies;
        //创建数组 cookis包含name 和value 所以包含
        $cookie_data=array('name'=>'user','value'=>'张学友');
        //调用cookies的add()方法 把cookie_data加入到响应当中
        $cookies->add(new cookie($cookie_data));
        //删除cookie 这里是删除user数据
        $cookies->remove('user');
        //获取cookies数据
        echo $cookies->getValue('user');
        //如果cookies 里面的user不存在会打印20的数据
        echo $cookies->getValue('user',20);


    }
}