<?php

namespace backend\controllers\actions\goods;

use common\models\Category;
use common\models\Good;
use yii\base\Action;
use yii\web\UploadedFile;

class CreateAction extends Action
{
    public function run()
    {
        $good = new Good;

        if (\Yii::$app->request->isPost) {
            $params = \Yii::$app->request->post();

            if ($good->load($params) && $good->save()) {
                $good->imageFiles = UploadedFile::getInstances($good, 'imageFiles');
                $good->upload();


                \Yii::$app->session->setFlash('success', "Товар з id: {$good->id} створений");

                return $this->controller->redirect('index');
            }
        }

        $categories = Category::find()->select(['title'])->where([
            'status' => Category::STATUS_ACTIVE
        ])->andWhere(['=', 'is_deleted', Good::NOT_DELETED])->indexBy('id')->column();

        return $this->controller->render('create', [
            'good' => $good,
            'categories' => $categories,
        ]);
    }
}