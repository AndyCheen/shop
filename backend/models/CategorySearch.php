<?php

namespace backend\models;

use common\models\Category;
use yii\data\ActiveDataProvider;

class CategorySearch extends Category
{

    public function rules(): array
    {
        return [
            [['id', 'parent_id', 'status', 'is_deleted'], 'integer'],
            [['title', 'created_at', 'updated_at'], 'string'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Category::find()->where(['is_deleted' => 0]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }



}