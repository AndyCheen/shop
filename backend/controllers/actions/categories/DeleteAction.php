<?php

namespace backend\controllers\actions\categories;

use common\models\Category;
use common\models\Good;
use Yii;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class DeleteAction extends Action
{
    public function run(int $id)
    {
        $category = Category::findOne($id);

        if (!$category) {
            throw new NotFoundHttpException("Категорію з id: $id не знайдено");
        }

        $hasGoodsInCategory = Good::find()->select('id')->where([
            'category_id' => $id
        ])->exists();

        if ($hasGoodsInCategory) {
            Yii::$app->session->setFlash('error', "Не можу видалити категорію $id через наявність в ній товарів");

            return $this->controller->redirect('index');
        }

        $category->is_deleted = 1;

        if ($category->save()) {
            Yii::$app->session->setFlash('success', "Категорію з id: $id видалено");
        } else {
            Yii::$app->session->setFlash('error', 'Відбулась помилка. Категорыя не видалена.');
        }

        return $this->controller->redirect('index');

    }
}