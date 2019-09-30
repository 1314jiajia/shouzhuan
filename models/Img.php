<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Img extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'img';
    }
    /**
     * @var UploadedFile
     */
    // public $uploadFile;

    public function rules()
    {
        return [

            [['created_at', 'updated_at'], 'integer'],
            [['keywords', 'description', 'images'], 'string', 'max' => 88],
        

        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keywords' => '关键词',
            'description' => '描述',
            'images' => '轮播图',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}