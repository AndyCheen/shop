<?php

namespace backend\models;

use common\models\Option;
use yii\data\ActiveDataProvider;

class OptionsSearch extends Option
{
    public function rules(): array
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['title', 'type'], 'string'],
        ];
    }

    public function search(array $params): ActiveDataProvider
    {
        $query = Option::find()->where(['is_deleted' => Option::NOT_DELETED]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if(!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);
        $query->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}