<?php

namespace app\controllers\Home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;



/**
  * 前端页面显示
  */
 class MyaccountController extends Controller
 {
 	// 个人
 	public function actionMyaccount()
 	{
   
    	return  $this->renderPartial('/home/Myaccount');

 	}


 }