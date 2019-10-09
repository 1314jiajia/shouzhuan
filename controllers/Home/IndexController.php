<?php

namespace app\controllers\Home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Img;
use app\models\Applist;
use app\models\UploadFiles;
use yii\web\UploadedFile;
use yii\data\Pagination;


/**
  * 前端页面显示
  */
 class IndexController extends Controller
 {
 	// 轮播图
 	public function actionIndex()
 	{
        // 获取到当前域名
        $path = Yii::$app->request->hostInfo;
      
    	$img = new img();

    	// 获取到所有的轮播图
     	$list = $img::find()->all();
    	
    	// 获取轮播图地址
    	foreach ($list as &$v){

            $v['images'] = "$path/".$v['images'];
    	
        }

    	// 获取内容部分
    	$applist = new applist();

    	$info = $applist::find()->all();
    	// 小图标
    	foreach ($info as &$v){

    		$v['images'] = "$path/".$v['images'];
    	}
    	// var_dump($a);die;
    	return  $this->renderPartial('/home/index',['list'=>$list,'info'=>$info]);

 	}


 }