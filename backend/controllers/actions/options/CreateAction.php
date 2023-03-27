<?php

namespace backend\controllers\actions\options;

use common\models\Category;
use common\models\Option;
use yii\base\Action;

class CreateAction extends Action
{
    public function run()
    {
        $option = new Option();

        if (\Yii::$app->request->isPost) {
            $params =  \Yii::$app->request->post();

            if ($option->load($params) && $option->save()) {
                \Yii::$app->session->setFlash('success', "Параметр {$option->title} (id: {$option->id}) створено.");
                return $this->controller->redirect('index');
            }
        }

        $categories = Category::find()->select('title')->where([
            'is_deleted' => Category::NOT_DELETED
        ])->indexBy('id')->column();

        return $this->controller->render('create', [
            'option' => $option,
            'categories' => $categories,
        ]);
    }
}