<?php 
//这里的test 数据已经继承了models avtiverecord的类
namespace app\controllers;
use yii\web\Controller;
//test.php 已经在models创建
use app\models\Test;
 class HelloController extends Controller{
 public function actionIndex(){
 //一般的是使用
 $sql = 'select * from test where id=1';
 // 这里是使用avtiverecord 的类的方法 
    $result = Test::findBySql($sql)->all();
	//用findBySql 防止 SQL注入 先把id=:1做成一个对象 防止id=1 or =1
	$result = Test::findBySql($sql,array(':id'=>1 or 1=1))->all();
	//yii框架的sql 查询 find方法 然后where条件 all进行返回
	$result = Test::find()->where(['id'=>1])->all();
	//id 大于0的数据
	$result = Test::find()->where(['>','id',0])->all();
	//1,2之间的数据
	$result = Test::find()->where(['between','id',0,1])->all();
    //like title字段相似的字段查询
	
	$result = Test::find()->where(['like','title','需要查询的名字如title1'])->all();
	//查询结果转化成数组 这能减少很多缓存
	$result = Test::find()->where(['between','id',0,1])->asArry()->all();
	//批量查询数据
	foreach比如用batch拿2条数据 放到 $test 程序就会结束
	foreach(Test::find()-batch(2) as $test){
	 print_r($results);
	 }
	print_R($results);
	
 }
 }
