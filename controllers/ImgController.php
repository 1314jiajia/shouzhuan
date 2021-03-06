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
use yii\data\Pagination;


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
	 	$uploads = new UploadFiles();

	 	// 实例化model类
	 	$model = new Img();
	 	$request = Yii::$app->request;
	 	if ($model->load($request->post()) && $model->validate()) {

	 		$uploads->images = UploadedFile::getInstance($uploads, 'images');
	 		$rand = md5(time() . mt_rand(10000, 99999));
	 		$filepath = 'uploads/' . $rand . '.' . $uploads->images->extension;
	 		
	 		// 图片保存
	 		$saveRet = $uploads->images->saveAs($filepath);
	 		
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
	 	return $this->render('create',['model'=>$model,'uploads' => $uploads ]);
	 } 	

	 /**
	  * 轮播图展示界面
	  */
	 public function actionIndex()
	 {	
	 	// 和数据库对接
	 	$model = new img();

        // 得到文章的总数（但是还没有从数据库取数据）
        $query = $model::find();

        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,"pageSize"=>3]);

        // 使用分页对象来填充 limit 子句并取得文章数据
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
            
    
        return $this->render('index',['info'=>$articles,'pagination' => $pagination]);


	 }

	 /**
	  * 修改方法
 	  */
	 public function actionEdit()
	 {	
	 	// 实例化
	 	$model = new  img();
		
		// 上传类		
		$uploads = new UploadFiles();

		// 
		$request = Yii::$app->request;
		 	
	 	// 获取到要修改的数据id
		$id = $request->get('id');

		// 根据id获取数据
		$edit = $model->findone($id);
// start
		// 获取修改数据
		if ($edit->load($request->post())) {

			// 判断图片是否有上传

		 		$uploads->images = UploadedFile::getInstance($uploads, 'images');
		 		
		 		// 对不修改图片做的处理
		 		if(!empty($uploads->images)){
				 		$rand = md5(time() . mt_rand(10000, 99999));
				 		$filepath = 'uploads/' . $rand . '.' . $uploads->images->extension;
		 		
		 				// 图片保存路径
		 				$saveRet = $uploads->images->saveAs($filepath);
		 		
		 				// 拼装入库数据 
						$edit->images = $filepath;
				}

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
		return $this->render('edit',['edit'=>$edit,'uploads'=>$uploads]);

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