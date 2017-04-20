<?php
namespace app\controllers;
use yii\web\Controller;

class ArticleController extends Controller{

	//保存提交过来的数据
	\YII::$app->response->headers->add('X-XSS-Protection', '0');
	echo \YII::$app->request->get('name');
}