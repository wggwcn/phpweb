
<?php 
//这里的test 数据已经继承了models avtiverecord的类
namespace app\controllers;
use yii\web\Controller;
//test.php 已经在models创建
use app\models\Test;
use app\models\Customer;
use app\models\Order;
 class HelloController extends Controller{
 public function actionIndex(){
//根据顾客查询他的订单信息
$customer = Customer::find()->where(['name'=>'zhangsan'])->one();
$orders = $customer->haMany->(Order::className(),['customer_id=>'id'])->asArray()->all();
//直接从CUSTOMER来调用$customer的类 同样也可以得一样的数据
$orders =$customer->getOrders();
//yii 通过自动的调用_get()函数 然后调用getOrders()然后调用all()的方法

$orders = $customer->orders;
//根据订单查询顾客的信息
//根据订单查询谷歌的信息
$order =Order::find()->where(['id'=>1])->one();
$customer = $order->customer;


print_r($orders);
 
}
}
 //Customer.php
 <?php
  namespace app\models;
 use yii\db\ActiveRecord;
 class Customer extends ActiveRecord{
 //帮助顾客获取订单信息
 public function getOrder(){
 $orders = $this->hasMany(Order::className(),['customer_id'=>'id'])->asArry();
 return $orders;
 }
 }
 
 //Order.php
 
 <?php
 namespace app\models;
 use yii\db\ActiveRecord;
 class Order extends ActiveRecord{
 //根据订单查询谷歌的信息
 public function getCustomer(){
 return $this->hasOne(Customer::className(),['id'='customer_id']->asArray();
}}
