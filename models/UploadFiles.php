<?php
namespace app\models;

use Yii;
use yii\base\Model;

class UploadFiles extends Model
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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => '图片',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}