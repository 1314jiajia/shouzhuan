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
		$uploadsModel = new UploadFiles(); 

		if($model->load($res->post())){
			// var_dump($model);die;
			$uploadsModel->img = UploadedFile::getInstance($uploadsModel, 'img');
	 		$rand = md5(time() . mt_rand(10000, 99999));
	 		$filepath = 'logo/' . $rand . '.' . $uploadsModel->img->extension;
	 		
	 		// 图片保存
	 		$saveRet = $uploadsModel->img->saveAs($filepath);
	 		
	 		// 拼装入库数据 
			$model->images = $filepath;

			// 分类 1 安卓 2 ios 3 其他
			$model->tag = $model->tag[0];
			
			// 评分 1 代表1颗星 5结束
			$model->score = $model->score[0];
			$model->img = '0';
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

		return $this->render('create',['model'=>$model ,'uploadsModel' => $uploadsModel ]);
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
        $pagination = new Pagination(['totalCount' => $count,"pageSize"=>5]);

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

}