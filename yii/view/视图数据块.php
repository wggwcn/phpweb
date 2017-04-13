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

//比如在commmon.php文件有一个<h1>我是大傻逼</h1>的内容
//然后index 样式不想用这个我是大傻逼 那怎么办呢
//可以使用这个beginBlock数据块的功能
//在index 文件这样子的
<h1>hahah</h1>
<?php $this->beginBlock('block1');?>
<h1>我就是这么帅</h1>
<?php $this->endBlock('block1');?>

//common.php文件
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<?php if (isset($this->blocks['block1']));
      $this->blocks['block'];
    else
       echo '<h1>我是大傻逼</h1>;

</body>
</html>
