<?php

namespace backend\controllers\actions\options;

use common\models\Option;
use yii\base\Action;
use yii\web\NotFoundHttpException;

class ViewAction extends Action
{
    public function run(int $id): string
    {
        $option = Option::findOne($id);

        if ($option === null || $option['is_deleted'] === Option::DELETED) {
            throw new NotFoundHttpException("Параметр з id {$id} не існує");
        }

        return $this->controller->render('view', ['option' => $option]);
    }
}