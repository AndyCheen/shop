<?php

namespace backend\controllers\actions\options;

use backend\models\OptionsSearch;
use common\models\Category;
use yii\base\Action;

class IndexAction extends Action
{
    public function run(): string
    {
        $searchModel = new OptionsSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE,
            'is_deleted' => Category::NOT_DELETED
        ])->indexBy('id')->column();

        return $this->controller->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }
}