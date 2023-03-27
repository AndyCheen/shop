<?php

namespace backend\controllers\actions\goods;

use common\models\Good;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class ViewAction extends Action
{
    public function run(int $id): string
    {
        $good = Good::findOne($id);
        if ($good === null || $good['is_deleted'] === Good::DELETED) {
            throw new NotFoundHttpException("Товара з id {$id} не існує");
        }

        return $this->controller->render('view', ['good' => $good]);

    }
}