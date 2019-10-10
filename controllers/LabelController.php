<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\label;
use yii\data\Pagination;


/**
  *  标签控制器
  */
 class LabelController extends Controller
 {
 	/*
	 * 标签添加
 	*/
 	public function actionCreate()
 	{
 		 $model = new  label();
 		 $res = Yii::$app->request;

 		 if($model->load($res->post())){

          $model->pid = $model->pid[0];
     		 	$model->created_at = time();
     		 	$model->updated_at = time();
     		 	// var_dump($model);die;
     		 	if(!$model->save()){
     		 		Yii::warning('insert  fail error '.json_encode($model->getErrors()));
     		 		throw new Exception('添加失败');
     		 	}
 		 	   return $this->redirect('index');
 		 }	
 		 

 		 return $this->render('create',['model'=>$model]);
 	}

	/**
	 * 展示界面
	 */
    public function actionIndex()
    {
        // 实例化model类
        $model = new label;

        // 得到文章的总数（但是还没有从数据库取数据）
        $query = $model::find();

        $count = $query->count();
        // 使用总数来创建一个分页对象
        $pagination = new Pagination(['totalCount' => $count,"pageSize"=>7]);

        // 使用分页对象来填充 limit 子句并取得文章数据
        $articles = $query->offset($pagination->offset)->limit($pagination->limit)->all();
            
    
        return $this->render('index',['info'=>$articles,'pagination' => $pagination]);

    }

    /**
     * 修改
     */
   public function actionEdit()
   {
   		// 实例化
   		$model = new label;

   		$res = Yii::$app->request;

   		$id = $res->get('id');
   		$info = $model->findOne($id);
   		$pid = $info->pid;
   		// 获取到要修改的数据
		if($info->load($res->post()) && $info->validate()){

			// 拼装一个跟新时间
			$info->updated_at = time();
			// var_dump($edit);die;
			if(!$info->update()){

				Yii::warning('update fail error' . json_encode($info->getErrors()));
				throw new Exception("修改失败", 1);
				
			}
			return $this->redirect('index');
		}

		if($pid == 1){

			$pid = "安卓"; 

		}else{

			$pid = "ios";
		}

		
   		return $this->render('edit',['edit'=>$info,'pid'=>$pid]);


   }

   /**
    * 删除
    */
   public function actionDel()
   {
   		// 实例化
   		$model = new label;

   		$res = Yii::$app->request;

   		// 通过上面定义好的请求,获取到当前选中的id
   	    $id = $res->get('id');
   	    
   	    //  通过id 去数据库中拿数据
   	    $del = $model::findOne($id)->delete();

   	    if(!$del){
   	    	Yii::warning('del fail error '.json_encode($del->getErrors()));
			throw new Exception("删除失败", 1);			
   	    }
   	    return $this->redirect('index');
   }

 }