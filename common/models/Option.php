<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Option model
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $type
 * @property boolean $is_deleted
 *
 * @property-read Category $category
 *
 */

class Option extends ActiveRecord
{
    public const ROOT_CATEGORY_ID = 0;

    public const NOT_DELETED = 0;
    public const DELETED = 1;

    public const TYPES = [
        'text' => 'text',
    ];
    public static function tableName(): string
    {
        return '{{%options}}';
    }

    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['category_id'], 'default', 'value' => self::ROOT_CATEGORY_ID],
            [['type'], 'default', 'value' => 'text'],
            [['is_deleted'], 'default', 'value' => self::NOT_DELETED],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'title' => 'Назва',
            'category_id' => 'Категорія',
            'type' => 'Тип',
        ];
    }

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}