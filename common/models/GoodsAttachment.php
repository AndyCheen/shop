<?php

namespace common\models;

use yii\db\ActiveRecord;

class GoodsAttachment extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%goods_attachments}}';
    }


    public function rules()
    {
        return [
            [['goods_id', 'url'], 'required'],
            [['goods_id'], 'number'],
            [['url'], 'string'],
        ];
    }
}