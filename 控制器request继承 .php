//文件控制器
<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
class HelloController extends  Controller{
    public  function  actionIndex(){
        //yii 请求控制器 因为yii是全局变量所以用/YII 定义YII地址
       $request = \YII::$app->request;
       //若干id有值 会返回ID 如果没有回返回20
       $request->get('id',20);
       //判断get请求
        if($request->isGet){
            echo 'this is get method';
        }

       $request->post('name',3333);
        //echo 'hello world';
        //判断post请求
        if ($request->ispost){
            echo 'this is get method';
        }
        //请求用户IP地址
        $request->userIp;
    }
}
\\创建的hello控制器反馈，域名用r=hello
http://localhost/basic/web/index.php?r=hello/index
\\在hello控制器里 请求ID=3 的反馈
http://localhost/basic/web/index.php?r=hello/index&id=3  
