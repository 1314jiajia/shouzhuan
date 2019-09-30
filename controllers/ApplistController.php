<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\applist;
use app\models\UploadFiles;
use yii\web\UploadedFile;
/**
 *  应用添加
 */
class ApplistController extends Controller
{
	
	/**
	  * 应用添加	
	 */
	public function actionCreate()
	{	
		
		// 实例化model类
		$model = new applist();
		
		$res = Yii::$app->request;
		
		// 上传类图片
		$uploadsModel = new UploadFiles(); 

		if($model->load($res->post())){
			$uploadsModel->img = UploadedFile::getInstance($uploadsModel, 'img');
	 		$rand = md5(time() . mt_rand(10000, 99999));
	 		$filepath = 'logo/' . $rand . '.' . $uploadsModel->img->extension;
	 		
	 		// 图片保存
	 		$saveRet = $uploadsModel->img->saveAs($filepath);
	 		
	 		// 拼装入库数据 
			$model->images = $filepath;
			$model->created_at = time();
			$model->updated_at = time();
			var_dump($model);die();
			if ( $model->validate() && $model->save() ) {

	 			return $this->redirect('index');

	 		} else {

                Yii::warning("insert fail, error:" . json_encode($model->getErrors()));
                throw new Exception("添加失败!");
	 		}
	 					
		}	

		return $this->render('create',['model'=>$model ,'uploadsModel' => $uploadsModel ]);
	}

	/*
		展示
	*/
	public function actionIndex()
	{
		// 实例化对象
		$model = new applist();

		// 获取到所有的数据
		$info = $model::find()->all();
		// var_dump($info);die();
		return $this->render('index',['info'=>$info]);
	}

}