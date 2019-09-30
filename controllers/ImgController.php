<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Img;
use app\models\UploadFiles;
use yii\web\UploadedFile;

/**
  *  轮播图控制器
  */
 class ImgController extends Controller
 {
	/**
	 * 轮播图添加界面
	 */
	 public function actionCreate()
	 {
	 	$uploadsModel = new UploadFiles();

	 	// 实例化model类
	 	$model = new Img();
	 	$request = Yii::$app->request;
	 	if ($model->load($request->post())) {

	 		$uploadsModel->img = UploadedFile::getInstance($uploadsModel, 'img');
	 		$rand = md5(time() . mt_rand(10000, 99999));
	 		$filepath = 'uploads/' . $rand . '.' . $uploadsModel->img->extension;
	 		
	 		// 图片保存
	 		$saveRet = $uploadsModel->img->saveAs($filepath);
	 		
	 		// 拼装入库数据 
			$model->images = $filepath;
			$model->created_at = time();
	 		$model->updated_at = time();
	 		// var_dump($model);die();
	 		if ($model->validate() && $model->save()) {

	 			return $this->redirect('index');

	 		} else {
	 			Yii::warning("insert fail, error:" . json_encode($model->getErrors()));
                throw new Exception("添加失败!");
	 		}
	 		
	 }
	 	// 显示添加页面
	 	return $this->render('create',['model'=>$model,'uploadsModel' => $uploadsModel ]);
	 } 	

	 /**
	  * 轮播图展示界面
	  */
	 public function actionIndex()
	 {	
	 	// 和数据库对接
	 	$model = new img();

	 	// 获取数据库中所有的数据
	 	$info = $model->find()->all();

	 	// 分配变量显示页面 
	 	return $this->render('index',['info'=>$info]);
	 }

	 /**
	  * 修改方法
 	  */
	 public function actionEdit()
	 {	
	 	// 实例化数据库
	 	$model = new  img();
		
		// 上传类		
		$uploadsModel = new UploadFiles();

		// 
		$request = Yii::$app->request;
		 	
	 	// 获取到要修改的数据id
		$id = $request->get('id');

		// 根据id获取数据
		$edit = $model->findone($id);
// start
		// 判断图片是否有上传
		if ($edit->load($request->post())) {

	 		$uploadsModel->img = UploadedFile::getInstance($uploadsModel, 'img');
	 		$rand = md5(time() . mt_rand(10000, 99999));
	 		$filepath = 'uploads/' . $rand . '.' . $uploadsModel->img->extension;
	 		
	 		// 图片保存路径
	 		$saveRet = $uploadsModel->img->saveAs($filepath);
	 		
	 		// 拼装入库数据 
			$edit->images = $filepath;

	 		$edit->updated_at = time();
	 		
	 		// 验证通过之后更新数据
	 		if ($edit->validate() && $edit->save()) {
	 			if($edit->update($id,$edit->attributes)){
	 				 Yii::app()->user->setFlash('success','1');
	 			}

	 			return $this->redirect('index');

	 		} else {
	 			Yii::warning("insert fail, error:" . json_encode($edit->getErrors()));
                throw new Exception("修改失败!");
	 		}
	 		
	 }
	 	// 加载修改页面
		return $this->render('edit',['edit'=>$edit,'uploadsModel'=>$uploadsModel]);

	 }

	 /**
	  * 删除方法
	  */
	 public function actionDel()
	 {
	 	// 实例化user类
        $model = new img;

        // 全局类
        $res = Yii::$app->request;

        // 获取到删除的id
        $id = $res->get('id');

        // 根据id找到数据干掉
        $customer = $model::findOne($id)->delete();
        // var_dump($customer);die;
        if(!$customer){
        	Yii::warning('update fail error'. json_encode($edit->getErrors()));
				throw new Exception("删除失败", 1);
				
        }
        // 显示用户列表
        return $this->redirect('index');

	 }

 } 