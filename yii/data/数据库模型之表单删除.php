<?php 
//这里的test 数据已经继承了models avtiverecord的类
namespace app\controllers;
use yii\web\Controller;
//test.php 已经在models创建
use app\models\Test;
 class HelloController extends Controller{
 public function actionIndex(){
 //删除数据
 Test::find()->where(['id'=>1])->all();
 $results[0]->delete();
 
 // 快速删除 id大于0的值会被删除掉
 Test::deleteAll('id>:id',array(':id'=>0));
 
 }
 }
 
