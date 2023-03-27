<?php

namespace backend\controllers\actions\goods;

use common\models\Category;
use common\models\Good;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class UpdateAction extends Action
{
    public function run(int $id)
    {
        $good = Good::findOne($id);

        if (\Yii::$app->request->isPost) {
            if ($good->load(\Yii::$app->request->post()) && $good->save()) {
                $good->imageFiles = UploadedFile::getInstances($good, 'imageFiles');
                $good->upload();
                return $this->controller->redirect(['update', 'id' => $id]);
            }
        }

        if ($good === null || $good['is_deleted'] === Good::DELETED) {
            throw new NotFoundHttpException("Товара з id {$id} не існує");
        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE,
            'is_deleted' => Category::NOT_DELETED,
        ])->indexBy('id')->column();

        return $this->controller->render('update', [
            'good' => $good,
            'categories' =>$categories,
        ]);
    }
}