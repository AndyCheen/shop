<?php

namespace backend\controllers\actions\categories;

use common\models\Category;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class UpdateAction extends Action
{
    public function run(int $id)
    {
        $category = Category::findOne($id);


        if (\Yii::$app->request->isPost) {
            if ($category->load(\Yii::$app->request->post()) && $category->save()) {
                return $this->controller->redirect(['update', 'id' => $id]);
            }
        }

        if ($category === null || $category['is_deleted'] == Category::DELETED) {
            throw new NotFoundHttpException("Категорії з id {$id} не існує");
        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE,
            'is_deleted' => Category::NOT_DELETED,
        ])->andWhere(['!=', 'id', $category->id])->indexBy('id')->column();



        return $this->controller->render('update', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}