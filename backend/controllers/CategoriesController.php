<?php

namespace backend\controllers;

use common\models\Category;
use yii\data\Pagination;
use yii\web\Controller;

class CategoriesController extends Controller
{
    public function actionIndex()
    {
        $query = Category::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $categories = $query->orderBy('id')
            ->limit($pagination->limit)
            ->offset($pagination->offset)
            ->all();

        return $this->render('index', [
            'categories' => $categories,
            'pagination' => $pagination,
        ]);

    }

    public function actionCreate()
    {
        $category = new Category();
        if (\Yii::$app->request->isPost) {

            if ($category->load(\Yii::$app->request->post()) && $category->save()) {
                return $this->redirect('index');
            }

        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE
        ])->indexBy('id')->column();


        return $this->render('create', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }

//    public function actionTest(int $id)
//    {
//        var_dump($id);
//        die();
//    }

}