<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "special".
 *
 * @property string $id 咨询,专题
 * @property string $title 标题
 * @property string $keywords 关键词
 * @property string $description 描述
 * @property string $content 内容
 * @property int $browse 浏览量
 * @property int $type 1 咨询 2 专题
 * @property string $created_at 添加时间
 * @property string $updated_at 修改时间
 */
class Special extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'keywords', 'description', 'content','browse','type'], 'required','message' => '添加字段不能为空!'],
            [['browse', 'created_at', 'updated_at'], 'integer'],
            [['title', 'keywords', 'description'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 512],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'keywords' => '关键词',
            'description' => '描述',
            'content' => '内容',
            'browse' => '浏览次数',
            'type' => '类型',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
