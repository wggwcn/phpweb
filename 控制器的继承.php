//文件控制器
<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
class HelloController extends  Controller{
    public  function  actionIndex(){
        echo 'hello world';
    }
}
\\在function里面必须使用前置action  结构R 是反馈 HELLO 是控制器 index是hello控制器的执行文件地址
\\创建的hello控制器反馈，域名用r=hello
http://localhost/basic/web/index.php?r=hello/index
