<?php

namespace backend\controllers;

use backend\models\GoodsSearch;
use common\models\Category;
use common\models\Good;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class GoodsController extends Controller
{

    public function actionIndex()
    {

        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->get());

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE,
        ])->indexBy('id')->column();


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }

    public function actionCreate()
    {
        $good = new Good;

        if (\Yii::$app->request->isPost) {
            $params = \Yii::$app->request->post();

            if ($good->load($params) && $good->save()) {
                $savedGood = Good::find()->select('id')->where([
                    'title' => $params['Good']['title'],
                ])->orderBy([
                    'id' => SORT_DESC,
                ])->one();
                \Yii::$app->session->setFlash('success', "Товар з id: {$savedGood['id']} створений");

                return $this->redirect('index');
            }
        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE
        ])->andWhere(['=', 'is_deleted', Good::NOT_DELETED])->indexBy('id')->column();

        return $this->render('create', [
            'good' => $good,
            'categories' => $categories,
        ]);
    }

    public function actionUpdate(int $id)
    {
        $good = Good::findOne($id);

        if (\Yii::$app->request->isPost) {
            if ($good->load(\Yii::$app->request->post()) && $good->save()) {
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        if ($good === null || $good['is_deleted'] === Good::DELETED) {
            throw new NotFoundHttpException("Товара з id {$id} не існує");
        }

        $categories = Category::find()->select('title')->where([
            'status' => Category::STATUS_ACTIVE,
            'is_deleted' => Category::NOT_DELETED,
        ])->indexBy('id')->column();

        return $this->render('update', [
            'good' => $good,
            'categories' =>$categories,
        ]);
    }

    public function actionDelete(int $id)
    {
        $good = Good::findOne($id);

        if ($good === null || $good['is_deleted'] === Good::DELETED) {
            throw new NotFoundHttpException('"Товара з id {$id} не існує"');
        }

        $good->is_deleted = Good::DELETED;

        if ($good->save()) {
            \Yii::$app->session->setFlash('success', "Категорію з id: $id видалено");
        } else {
            \Yii::$app->session->setFlash('error', 'Відбулась помилка. Категорыя не видалена.');
        }


        return $this->redirect('index');
    }

    public function actionView(int $id)
    {
        $good = Good::findOne($id);
        if ($good === null || $good['is_deleted'] === Good::DELETED) {
            throw new NotFoundHttpException("Товара з id {$id} не існує");
        }

        return $this->render('view', ['good' => $good]);

    }
}