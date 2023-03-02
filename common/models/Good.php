<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Good model
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $status
 * @property integer $amount
 * @property integer $price
 * @property integer $new_price
 * @property integer $rating
 * @property integer $is_deleted
 * @property string $title
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property-read Category $category
 */
class Good extends ActiveRecord
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;
    public const DELETED = 1;
    public const NOT_DELETED = 0;

    public const STATUSES = [
        self::STATUS_ACTIVE => 'Активний',
        self::STATUS_INACTIVE => 'Не активний',
    ];

    public static function tableName()
    {
        return '{{%goods}}';
    }

    public function rules()
    {
        return [
            [['title', 'category_id', 'status', 'amount', 'price'], 'required'],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['is_deleted'], 'default', 'value' => self::NOT_DELETED],
            [['description'], 'string'],
            [['new_price'], 'number'],
            [['created_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Назва',
            'category_id' => 'Категорія',
            'status' => 'Статус',
            'amount' => 'Кількість',
            'price' => 'Ціна',
            'new_price' => 'Нова ціна',
            'rating' => 'Рейтинг',
            'description' => 'Опис',
        ];
    }

    public function getCategory(): ActiveQuery
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}