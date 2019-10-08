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
		$res = Yii::$app->request;

		$user = $model::find()->all();
		// var_dump($user);die; 
		// // 判断是否有内容上传
		if($model->load($res->post())){

			$info = $model::find()->where(['username' => $model->username])->one();
			// $a = $model->where('username='.$model->username);
			// var_dump($info);die;
			if($info){

				  // 获取到输入框的密码 
				  $model->password = md5($model->password . '_adfs');
				
				  // 密码比对
				  if($info->password == $model->password){
				  	
				  		return $this->redirect('/user/list');
					
					}else{

						Yii::warning('insert fail error' . json_encode($model->getErrors()));
             		
             			   throw new Exception("账号或密码有误!");
                
					}

			}
			

		}

  		return $this->renderPartial('login',['model'=>$model]);
		
	}

	
}
   