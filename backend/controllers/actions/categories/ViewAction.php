<?php

namespace backend\controllers\actions\categories;

use common\models\Category;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class ViewAction extends Action
{
    public function run(int $id): string
    {
        $category = Category::findOne($id);


        if ($category === null || $category['is_deleted'] == 1) {
            throw new NotFoundHttpException("Категорії з id {$id} не існує");
        }

        return $this->controller->render('view', [
            'category' => $category,
        ]);
    }
}