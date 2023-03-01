<?php

namespace backend\models;

use common\models\Good;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;

class GoodsSearch extends Good
{
    public function rules(): array
    {
        return [
            [['id', 'category_id', 'status', 'is_deleted', 'amount'], 'integer'],
            [['title', 'description', 'created_at'], 'string'],
            [['price', 'new_price', 'rating'], 'number'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Good::find()->where(['is_deleted' => Good::NOT_DELETED]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'amount' => $this->amount,
            'price' => $this->price,
            'new_price' => $this->new_price,
            'rating' => $this->rating
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}