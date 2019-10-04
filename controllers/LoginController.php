<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class LoginController extends Controller
{
	// 登录
	public function actionLogin()
	{	
		$model = new user();
		$user = Yii::$app->request;

		if($model->load($user->post())){
			var_dump($model);die;
		}
		// return $this->renderPartial('login');
		return $this->render('login');
		
	}
}
   