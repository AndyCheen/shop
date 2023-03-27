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
 *
 * @property-read Category $parent
 */
class Category extends ActiveRecord
{

    public const ROOT_CATEGORY_ID = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const DELETED = 1;
    public const NOT_DELETED = 0;
    public static function tableName(): string
    {
        return '{{%categories}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id'], 'default', 'value' => self::ROOT_CATEGORY_ID],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['is_deleted'], 'default',  'value' => self::NOT_DELETED],
            [['created_at'], 'safe'],
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

    public function getParent()
    {
        return $this->hasOne(Category::class, [
            'id' => 'parent_id',
        ]);
    }

}