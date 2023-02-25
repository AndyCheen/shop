<?php

namespace backend\controllers;

use backend\models\CategorySearch;
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
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE
        ])->indexBy('id')->column();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $category = new Category();
        if (\Yii::$app->request->isPost) {
            $params = \Yii::$app->request->post();

            if ($category->load($params) && $category->save()) {
                \Yii::$app->session->setFlash('success', "Категорія {$params['Category']['title']} створена");
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
        $category = Category::findOne($id);


        if ($category === null || $category['is_deleted'] == 1) {
            throw new NotFoundHttpException("Категорії з id {$id} не існує");
        }

        return $this->render('view', [
            'category' => $category,
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

        if ($category === null || $category['is_deleted'] == 1) {
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

    public function actionDelete(int $id)
    {
        $category = Category::findOne($id);

        if (!$category) {
            throw new NotFoundHttpException("Категорію з id: $id не знайдено");
        }

        $category->is_deleted = 1;

        if ($category->save()) {
            \Yii::$app->session->setFlash('seccess', "Категорію з id: $id видалено");
        } else {
            \Yii::$app->session->setFlash('error', 'Відбулась помилка. Категорыя не видалена.');
        }

        return $this->redirect('index');


    }
}