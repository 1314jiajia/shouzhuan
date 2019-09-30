<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Links;

class LinksController extends Controller
{

	
	// 链接添加
	public function actionCreate()
	{	
		$model = new Links();

		// var_dump($model);die;
		 if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 修改,添加时间
            $model->created_at = time();
            $model->updated_at = time();
            // var_dump($model);die();
            // 添加到数据库中,取反
            if (!$model->save()) {
                Yii::warning("insert fail, error:" . json_encode($model->getErrors()));
                throw new Exception("添加失败!");
            }

            // 添加成功之后重定向到用户展示页面,下面需要有方法来指定这个页面
            return $this->redirect('/links/index');
        }
        // var_dump('123');die;
		return $this->render('/links/create',['model' => $model]);
	}

	// 链接展示
	public function actionIndex()
	{	
		 // 实例化model类
        $model = new links;

        // 获取到所有的信息
        $info = $model::find()->all();
		return $this->render('/links/index',['info'=>$info]);
	}

	// 链接修改
	 public function actionEdit($id)
    {
        $model = new links;
        
        $res = Yii::$app->request;

        // 获取当前用户的id
        $id = $res->get('id');

        // 根据id查出来要修改的数据
        $edit = $model::findone($id);
        // $count = User::model()->updateByPk($id,$username);
        if ($edit->load(Yii::$app->request->post()) && $edit->validate()) {
            
            // 修改时间
            $edit->updated_at = time();
            
            // 添加到数据库中,取反
            if (!$edit->update()) {
                Yii::warning("update fail, error:" . json_encode($edit->getErrors()));
                throw new Exception("修改失败!");
            }

            //添加成功之后重定向到用户展示页面,下面需要有方法来指定这个页面
            return $this->redirect('/links/index');
        }
        
        // 返回页面 和修改数据
        return $this->render('/links/edit',['edit'=>$edit]);
    }

    public function actionDel()
    {
    	 // 实例化user类
        $model = new links;

        // 全局类
        $res = Yii::$app->request;

        // 获取到删除的id
        $id = $res->get('id');

        // 根据id找到数据干掉
        $customer = $model::findOne($id)->delete();

        // 显示用户列表
        return $this->redirect('/links/index');

    }
}