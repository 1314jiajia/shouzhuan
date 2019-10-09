<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class actionsController extends Controller
{
	public function actions()
	{

		return [
		    'ueditor'=>[
		        'class' => '/ueditor/UeditorAction',
		        'config'=>[
		            //上传图片配置
		            'imageUrlPrefix' => "", /* 图片访问路径前缀 */
		            'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
		        ]
		    ]
		];	
	}

}