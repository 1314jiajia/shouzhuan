<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "applist".
 *
 * @property string $id
 * @property string $name app名称
 * @property string $images 图片
 * @property string $tag 分类
 * @property string $size 文件大小
 * @property string $browse 浏览次数
 * @property int $score 评分
 * @property string $download 下载次数
 * @property string $introduce 内容介绍
 * @property string $qrcode 下载地址
 * @property int $created_at
 * @property string $updated_at
 * @property int $type 1 安卓 2 ios 3 综合
 */
class Applist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'applist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size', 'browse', 'score', 'download', 'created_at', 'updated_at'], 'integer'],
            [['introduce'], 'string'],
            [['name', 'images', 'tag', 'qrcode'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'images' => '小图标',
            'tag' => '分类',
            'size' => '文件大小',
            'browse' => '浏览次数',
            'score' => '评分',
            'download' => '下载次数',
            'introduce' => '内容介绍',
            'qrcode' => '下载地址',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => '类型',
        ];
    }
}
