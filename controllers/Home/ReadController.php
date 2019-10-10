<?php

namespace app\controllers\Home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\UploadFiles;
use yii\web\UploadedFile;
use yii\data\Pagination;


/**
  * 前端页面显示
  */
 class ReadController extends Controller
 {
 	// 阅读赚钱
 	public function actionRead()
 	{

    	return  $this->renderPartial('Read');

 	}


 }