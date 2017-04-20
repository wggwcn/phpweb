<?php
namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller{

	public function actionIndex(){
		$user = (new \yii\db\Query())
			->select('*')
			->from('users')
			->where('name=:name', ['name'=>'zhangsan'])
			->one();
			print_r($user);
	}
}