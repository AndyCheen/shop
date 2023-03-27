<?php

namespace backend\controllers\actions\options;

use common\models\Option;
use common\models\Category;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class UpdateAction extends Action
{
    public function run(int $id)
    {
        $option = Option::findOne($id);

        if (\Yii::$app->request->isPost) {
            $params = \Yii::$app->request->post();

            if ($option->load($params) && $option->save()) {
                \Yii::$app->session->setFlash('success', "Опція {$option->title} (id: {$option->id}) оновлена");
                return $this->controller->redirect(['update', 'id' => $id]);
            }
        }

        if ($option === null || $option['is_deleted'] === Option::DELETED) {
            throw new NotFoundHttpException("Параметр з id {$id} не існує");
        }

        $categories = Category::find()->select('title')->where([
            'is_deleted' => Category::NOT_DELETED
        ])->indexBy('id')->column();

        return $this->controller->render('update', [
            'categories' => $categories,
            'option' => $option,
        ]);
    }
}