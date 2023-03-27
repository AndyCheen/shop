<?php

namespace backend\controllers\actions\goods;

use common\models\Good;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class DeleteAction extends Action
{
    public function run(int $id)
    {
        $good = Good::findOne($id);

        if ($good === null || $good['is_deleted'] === Good::DELETED) {
            throw new NotFoundHttpException("Товара з id {$id} не існує");
        }

        $good->is_deleted = Good::DELETED;

        if ($good->save()) {
            \Yii::$app->session->setFlash('success', "Товар з id: $id видалено");
        } else {
            \Yii::$app->session->setFlash('error', 'Відбулась помилка. Товар не видалено.');
        }


        return $this->controller->redirect('index');
    }
}