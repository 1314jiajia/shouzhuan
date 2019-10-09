<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFiles extends Model
{
    /**
     * @var UploadedFile
     */
    public $img;
    public $images;

    public function rules()
    {
        return [
            [['img','images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles' => 4],
        ];
    }

    // 上传多个文件
    // public function upload()
    // {
    //     if ($this->validate()) { 
    //         foreach ($this->img as $file) {
    //             $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
    //         }
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'images' => '图片',
            'img'=>'图片上传',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}