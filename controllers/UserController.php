<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class UserController extends Controller
{
    // 指定模板
    // public $layout = 'main.php';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     *  用户添加页面展示和操作全都在一起
     *  在add显示页面中他可以帮助你动态生成一个添加页面 
     */
    public function actionAdd()
    {
     
        // 实例化model下面的user类    validate
        $model = new User();

        // 如果表单有数据提交那么就走下面否则就显示页面
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            // 加密密码
            $model->password = md5($model->password . '_adfs');
            
            // 修改,添加时间
            $model->created_at = time();
            $model->updated_at = time();
            
            // 添加到数据库中,取反
            if (!$model->save()) {
                Yii::warning("insert fail, error:" . json_encode($model->getErrors()));
                throw new Exception("添加失败!");
            }

            // 添加成功之后重定向到用户展示页面,下面需要有方法来指定这个页面
            return $this->redirect('/user/list');
        }

        // 显示添加表单的页面
        return $this->render('add', ['model' => $model]);
    }

     /**
     * @return 用户界面的显示信息
     * @return view list
     */
    public function actionList()
    {
        // 实例化model类
        $model = new user;

        // 获取到所有的信息
        $info = $model::find()->all();
        // var_dump($info);die();
        return $this->render('list',['info'=>$info]);
     
      
    }

     /**
     * @return 用修改信息
     * @return view edit
     */
    public function actionEdit($id)
    {
        $model = new user;
        
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
            return $this->redirect('/user/list');
        }
        
        // 返回页面 和修改数据
        return $this->render('/user/edit',['edit'=>$edit]);
    }

    /**
     * @return 删除页面
     * @return view del
     */
    public function actionDel()
    {
        // 实例化user类
        $model = new user;

        // 全局类
        $res = Yii::$app->request;

        // 获取到删除的id
        $id = $res->get('id');

        // 根据id找到数据干掉
        $customer = $model::findOne($id)->delete();

        // 显示用户列表
        return $this->redirect('/user/list');

    }

}
 