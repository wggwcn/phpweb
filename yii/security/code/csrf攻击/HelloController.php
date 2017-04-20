<?php
namespace app\controllers;
use yii\web\Controller;

class HelloController extends Controller{

	public function actionTest1(){
		if(\YII::$app->request->isPost){
			echo \YII::$app->request->post('title');
		}else{
			$csrfToken = \YII::$app->request->csrfToken;
			return $this->renderPartial('test', ['csrfToken'=>$csrfToken]);
		}
	}
}