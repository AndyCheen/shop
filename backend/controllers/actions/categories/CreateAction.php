<?php
namespace backend\controllers\actions\categories;

use common\models\Category;
use yii\base\Action;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

class CreateAction extends Action
{
    public function run()
    {
//        return 'Hello';
        $category = new Category();
        if (\Yii::$app->request->isPost) {
            $params = \Yii::$app->request->post();

            if ($category->load($params) && $category->save()) {
                \Yii::$app->session->setFlash('success', "Категорія {$params['Category']['title']} створена");
                return $this->controller->redirect('index');
            }
        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE
        ])->indexBy('id')->column();

        return $this->controller->render('create', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}