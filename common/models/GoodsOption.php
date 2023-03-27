<?php

namespace common\models;

use yii\db\ActiveRecord;

class GoodsOption extends ActiveRecord
{

    public static function tableName(): string
    {
        return '{{%goods_options}}';
    }

    public function rules(): array
    {
        return [
            [['goods_id', 'option_id'], 'integer'],
            [['value'], 'string']
        ];
    }
}
