<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\special;
use yii\data\Pagination;


/**
 *  应用添加
 */
class SpecialController extends Controller
{
	/*
		专题/咨询添加
	*/
	public function actionCreate()
	{
		$model = new special();
		$res = Yii::$app->request;

		// // 判断是否有内容上传
		if($model->load($res->post())){

			$model->type = $model->type[0];
			$model->created_at = time();
			$model->updated_at = time();
			// var_dump($model);die();	
			if(!$model->save()){
				Yii::warning('insert fail error' . json_encode($model->getErrors()));
				throw new Exception("添加失败", 1);
				
			}
			return $this->redirect('index');
		}

		return $this->render('/special/create',['model' => $model]);
	}

	/**
	  * 专题/咨询 展示 
	  */
	public function actionIndex()
	{
		$model = new special();

		 // 得到文章的总数（但是还没有从数据库取数据）
        $query = $model::find();

        $count = $query->count();

        // 使用总数来创建一个分页对象,和每页分几个
        $pagination = new Pagination(['totalCount' => $count,"pageSize"=>7]);

        // 使用分页对象来填充 limit 子句并取得文章数据
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
            
    
        return $this->render('/special/index',['info'=>$articles,'pagination' => $pagination]);

	}

	/**
	 * 删除
	 */

	public function actionDel()
	{
		$model = new special();

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

	/**
     * 修改
	 */

	public function actionEdit()
	{
		$model = new special;

		$res = Yii::$app->request;

		// 获取修改的数据id
		$id = $res->get('id');

		// 根据修改id获取修改信息
		$edit = $model->findOne($id);
		// var_dump($edit);die;
		$type = $edit->type;

		// 获取到要修改的数据
		if($edit->load($res->post()) && $edit->validate()){

			// $edit->type = $edit->type[0];
			// 拼装一个更新时间
			$edit->updated_at = time();
			// var_dump($edit);die;
			if(!$edit->update()){

				Yii::warning('update fail error' . json_encode($edit->getErrors()));
				throw new Exception("修改失败", 1);
				
			}
			return $this->redirect('index');
		}

		if($type == 1){

			$type = "专题"; 

		}else{

			$type = "咨询";
		}

		return $this->render('edit',['edit'=>$edit,'type'=>$type]);
	}




}