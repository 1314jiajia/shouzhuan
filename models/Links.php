<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "links".
 *
 * @property int $id 友情链接
 * @property string $links 友情链接地址
 * @property string $titile 链接标题
 * @property string $created_at 添加时间
 * @property string $updated_at 更新时间
 */
class Links extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['links','titile'],'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['links'], 'string', 'max' => 255],
            [['titile'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'links' => 'url地址',
            'titile' => '网站名称',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
