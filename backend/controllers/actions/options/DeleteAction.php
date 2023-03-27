<?php

namespace backend\controllers\actions\options;

use common\models\Option;
use yii\base\Action;
use yii\db\Exception;

class DeleteAction extends Action
{
    public function run(int $id)
    {
        $option = Option::findOne($id);

        if ($option === null || $option->is_deleted === Option::DELETED) {
            throw new Exception("Параметр з id {$id} не існує");
        }

        $option->is_deleted = Option::DELETED;

        if ($option->save()) {
            \Yii::$app->session->setFlash('success', "Параметр з id: {$id} видалено");
        } else {
            \Yii::$app->session->setFlash('error', "Відбулася помилка. Параметр з id: {$id} видалено");
        }

        return $this->controller->redirect('index');
    }
}