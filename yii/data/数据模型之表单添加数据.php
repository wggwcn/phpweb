<?php 
//这里的test 数据已经继承了models avtiverecord的类
namespace app\controllers;
use yii\web\Controller;
//test.php 已经在models创建
use app\models\Test;
 class HelloController extends Controller{
 public function actionIndex(){
 //增加数据 通过yii save 进行数据的增加
  $test = new Test;
  $test ->id = 3;
  $test ->title = 'title'
  //判断id是否符合保存
  $test->validate();//检测错误的函数
  if($test->hasErrrors()){
  echo 'data is error!';
  die;
  }
  $test ->save();
  
  
 //对用户上传的字段的验证
 //在modoles/test.php 控制器去调用验证器
 //Yii 提供一系列常用的核心验证器，主要存在于 yii\validators 命名空间之下。
 //为了避免使用冗长的类名，你可以直接用昵称来指定相应的核心验证器。
// 比如你可以用 required 昵称代指 yii\validators\RequiredValidator 类：
 
 
 use yii\db\ActiveRecord;
 class Test extents ActiveRecord{
 
 
   public function rules()
{
    //这里是对ID进行的数据规则检查
	return [
	['id','integer'],//整数检查
	['title','string','length'=>[0,5]]];//字符串长度检查
	
    return [
        [['email', 'password'], 'required'],
    ];
	boolean（布尔型）
[
    // 检查 "selected" 是否为 0 或 1，无视数据类型
    ['selected', 'boolean'],

    // 检查 "deleted" 是否为布尔类型，即 true 或 false
    ['deleted', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
]
}
 }
 }
 
