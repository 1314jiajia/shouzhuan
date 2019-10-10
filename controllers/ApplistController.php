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
use app\models\UploadFile;
use app\models\UploadFiles;
use yii\web\UploadedFile;
use yii\data\Pagination;

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
		$uploadsModel = new UploadFile(); 

		// 多图片上传
		$uploads = new UploadFiles(); 

		if($model->load($res->post()) ){
			// logo图片
			$uploadsModel->img = UploadedFile::getInstance($uploadsModel, 'img');

			// 多图片上传
			$uploads->images = UploadedFile::getInstances($uploads, 'images');
		
			// 单图片上传
			$model->images = $uploadsModel->upload();

			// 多图片上传
			$model->img = json_encode($uploads->upload());
		
			// 分类 1 安卓 2 ios 3 其他
			$model->tag = $model->tag[0];
			
			// 评分 1 代表1颗星 5结束
			$model->score = $model->score[0];
			// 浏览次数
			$model->browse += 1;
			// 下载次数
			$model->download += 1;
			$model->created_at = time();
			$model->updated_at = time();
			// var_dump($model);die();
			if ( $model->validate() && $model->save() ) {

	 			return $this->redirect('index');

	 		} else {

                Yii::warning("insert fail, error:" . json_encode($model->getErrors()));
                throw new Exception("添加失败!");
	 		}
	 					
		}	

		return $this->render('create',['model'=>$model ,'uploadsModel' => $uploadsModel,'uploads'=>$uploads ]);
	}

	/*
		展示
	*/
	public function actionIndex()
	{
		// 实例化对象
		$model = new applist();


		$query = $model::find();

        $count = $query->count();

        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,"pageSize"=>4]);

        // 使用分页对象来填充 limit 子句并取得文章数据
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
            
    
        return $this->render('index',['info'=>$articles,'pagination' => $pagination]);

	}

	/**
	 * 删除
	 */

	public function actionDel()
	{
		$model = new applist();

		$res = Yii::$app->request;

		// 获取到删除数据id
		$id = $res->get('id');

		// 干掉
		$del = $model::findOne($id)->delete();
		
		if($del){
			// Yii::success()
			return $this->redirect('index');
		
		}else{

			Yii::warning('delete fail error' . json_encode($del->getErrors()));
			throw new Exception("删除失败", 1);
			
		}
	}

	// 修改
	public function actionEdit()
	{
		$model = new applist();

		// 上传类		
		$uploadsModel = new UploadFiles();

		//单张
		$uploads = new UploadFile();

		// 
		$request = Yii::$app->request;
		 	
	 	// 获取到要修改的数据id
		$id = $request->get('id');

		// 根据id获取数据
		$edit = $model->findone($id);
		// var_dump($edit);die;
		// 获取分类和评分的值
		$tag = $edit->tag;
		$score = $edit->score;
		
		
// start
		// 获取修改数据
		if ($edit->load($request->post())) {

			 // 4 代表没有文件上传 0 代表成功
			// 判断图片是否有上传
			// if( $edit->images->error != 4 ){

		 		 $uploads->img = UploadedFile::getInstance($uploads, 'img');
		 		 // var_dump( $uploads->img );die;
		 		// $uploads->images = UploadedFile::getInstances($uploadsModel, 'images');
		 		// 未修改图片的处理 
		 		if(!empty($uploads->img )) {

			 		$rand = md5(time() . mt_rand(10000, 99999));
			 		$filepath = 'uploads/' . $rand . '.' . $uploads->img->extension;
			 		
			 		// 图片保存路径
			 		$saveRet = $uploads->img->saveAs($filepath);
			 		
			 		// 拼装入库数据 
					$edit->img = $filepath;
				}	

				// $edit->img = $uploads->img;
				// var_dump($edit);die;
		 		$edit->updated_at = time();
	 			// var_dump($edit);die;
		
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
	 		if($tag == 1){

				$tag = "安卓"; 

			}else{

				$tag = "iOS";
			}

			switch ($score) {
				case '1':
					$score = '一颗星';
					break;
				case '2':
					$score = '二颗星';
					break;
				case '3':
					$score = '三颗星';
					break;
				case '4':
					$score = '四颗星';
					break;
				case '5':
					$score = '五颗星';
					break;
				
				default:
					# code...
					break;
			}
	 	// 加载修改页面
		return $this->render('edit',['edit'=>$edit,'uploadsModel'=>$uploadsModel,'tag'=>$tag,'score'=>$score,'uploads'=>$uploads]);

	}
	

}