<?php

namespace backend\controllers;

use common\models\Category;
use yii\data\Pagination;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoriesController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $query = Category::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
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

    /**
     * @return string|\yii\web\Response
     */
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

    public function actionView(int $id)
    {
        $categoru = Category::findOne($id);


        if ($categoru === null) {
            throw new NotFoundHttpException("Категорії з id {$id} не існує");
        }

        return $this->render('view', [
            'category' => $categoru,
        ]);
    }


    public function actionUpdate(int $id)
    {
        $category = Category::findOne($id);


        if (\Yii::$app->request->isPost) {
            if ($category->load(\Yii::$app->request->post()) && $category->save()) {
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        if ($category === null) {
            throw new NotFoundHttpException("Категорії з id {$id} не існує");
        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE
        ])->andWhere(['!=', 'id', $category->id])->indexBy('id')->column();



        return $this->render('update', [
            'category' => $category,
            'categories' => $categories,
        ]);
    }
}