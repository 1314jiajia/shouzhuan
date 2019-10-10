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
    public $images;

    public function rules()
    {
        return [
            [['images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles' => 6],

        ];
    }


   
    // 上传多个文件
    // public function upload()
    // {
    //     if ($this->validate()) { 
    //         foreach ($this->images as $file) {
    //             $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
    //         }
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
     public function upload()
    {
        if ($this->validate()) {
             

            $images = [];
            if($this->images){
                 foreach ($this->images as $file) {
                    $rand = md5(time() . mt_rand(10000, 99999));
                     $path = 'uploads/' . $rand . '.' . $file->extension;                     
                     if( $file->saveAs($path)){
                            $images[] = $path;
                     }

                
                 }
                  return $images;
            }

        } else {
            return false;
        }
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'images' => '多图片上传',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}