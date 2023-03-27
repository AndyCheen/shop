<?php

namespace backend\controllers\actions\categories;

use backend\models\CategorySearch;
use common\models\Category;
use yii\base\Action;

class IndexAction extends Action
{
    public function run(): string
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE
        ])->indexBy('id')->column();

        return $this->controller->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }
}