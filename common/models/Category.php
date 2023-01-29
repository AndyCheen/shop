<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Category model
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $title
 */
class Category extends ActiveRecord
{

    public const ROOT_CATEGORY_ID = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public static function tableName()
    {
        return '{{%categories}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id'], 'default', 'value' => self::ROOT_CATEGORY_ID],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Назва',
            'parent_id' => 'Батьківська категорія',
            'status' => 'Статус',
        ];
    }
}