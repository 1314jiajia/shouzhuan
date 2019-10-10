<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "label".
 *
 * @property int $id 标签id
 * @property string $label 标题名称
 * @property string $pid 类型id
 * @property string $created_at 添加时间
 * @property string $updated_at 更新时间
 */
class Label extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'label';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['label'],'required','message'=>'标签字段不能为空'],
            // [['pid', 'created_at', 'updated_at'], 'integer'],
            // [['pid','label'], 'string', 'max' => 50],

            [['pid', 'created_at', 'updated_at'], 'integer'],
            [['label'], 'string', 'max' => 11],
        
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => '标签',
            'pid' => '标签类型',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
