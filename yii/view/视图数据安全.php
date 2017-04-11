<?php
//命名空间控制器
namespace app\controllers;
//使用YII控制器
use yii\web\Controller;
//使用yii的cookie处理
use yii\web\cookie;
class HelloController extends  Controller{
    public  function  actionIndex(){
        //返回视图文件 这index.php 可以不用换加后缀yii已经处理 renderPartial是调用视图文件的意思
        //调用的index文件是在basic/view/hello/index.php  yii是调用后hello控制器则要用户hello控制器的文件下
        $hello_str = 'hello asshole';
        $test_arr = array(1,2);
        //创建数组
        $data = array();
        //把需要传递给视图的数据放到数组中
        $data['view_hello_str'] = $hello_str;
        $data['view_test_str'] = $test_arr;
      return $this->renderPartial('index',$data);


    }
}
?>
//index.php 文件
//返回hello asshole
<h1><?=$view_hello_str;?></h1>
//这里是返回数组的第一个值 1
<h1><?=$view_test_str[0];?></h1>
//index.php防止入注攻击
<?php
//使用html类是过滤javascript文件执行 但是会显示出来 这样能有效的防止攻击
use yii\helper\Html;
////使用html类是过滤javascript文件执行 但是不会显示出来 这个推荐使用
use yii\helper\HtmlPUrifier;
?>
<h1><?=Html::$view_hello_str;?></h1>
<h1><?=HtmlPUrifier::$view_hello_str;?></h1>
