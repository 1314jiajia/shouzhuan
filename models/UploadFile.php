<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $img;

    public function rules()
    {
        return [
            [['img'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

     public function upload()
    {
        if ($this->validate()) {
             
             $rand = md5(time() . mt_rand(10000, 99999));

            if($this->img){
                
                 $path = 'logo/' . $rand . '.' . $this->img->extension;
                 if($this->img->saveAs($path)){
                    return $path;
                }
            }

        } else {
            return false;
        }
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img'=>'单图片上传',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}