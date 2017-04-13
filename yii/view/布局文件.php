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

//在样式layout里面设置样式
//这个是layout的样式文件 上面的index 文件指向$content内容
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>DOCUMENT</title>
</head>
<?=$content;?>
</body>
</html>

//在views文件下面的index.php 已经指向到了$content 了 现在只需要输入内容就可以了
//比如 index.php输入 <h1>我是张学友</h1>结果就会出现正常html的我是张学友 这样可以省去很多很多重复的编写