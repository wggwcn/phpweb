<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
//使用yii的cookie处理
use yii\web\cookie;
class HelloController extends  Controller{

//设置共同的样式 在views/layouts里面
    public $layout = 'common';

    public  function  actionIndex(){

    return $this->render('index');//首先把index的文件内容放到$content里面
}
}

// 比如在views里有hello.php 和index.php
//如果我要在index.php呈现about.php的内容
<h1>hello index<h1>
<?php  echo $this->render('about');?>
//传递数据  比如传递数组
//在hello.php 里面指定键名
<?=$v_hello_str;?>
//在index文件里面指定 输出会是  我是张学友
<?php  echo $this->render('about',array('v_hello_str'=>'我是张学友'));?>
