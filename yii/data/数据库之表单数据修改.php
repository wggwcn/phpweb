<?php 
//这里的test 数据已经继承了models avtiverecord的类
namespace app\controllers;
use yii\web\Controller;
//test.php 已经在models创建
use app\models\Test;
 class HelloController extends Controller{
 public function actionIndex(){
 //修改数据的方法
 //首先把数据库的字段找出来 使用one快速调用
 $test = Test::find()->where(['id'=>4])->one();
 //给test 中需要修改的title 比如修改为title4
 $test->title = 'title4' ;
 然后再保存
 $test ->save();
 
 }
 }
 
