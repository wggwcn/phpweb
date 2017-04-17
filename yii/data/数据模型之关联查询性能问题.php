<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\Test;
use app\models\Customer;
use app\mpdels\Order;
class HelloController extends Controller{
  public function actionIndex(){
    //关联查询结果缓存
    $customer = Customer::find()->where(['name']=>'zhangsan')->one();
    
    $orders = $customer->orders;  //select ....
     //如果上面的语句已经执行 orders已经更新了 则需要使用unset清楚缓存 然后再查询
    
    unset($customer->orders);
    $orders2 =  $customer->orders;
    //关联的多次查询 如果这个$customers有多个数据  查询 相应的会对数据有多次查询会造成数据库工作量太大
    //这里使用with() 函数mysql语句进行改变
    $customers = Customer::find()->with('orders')->all();
    foreach($customers as $customer){
      $orders = $customer->orders;
  }
}
