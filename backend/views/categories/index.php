<?php

use backend\models\CategorySearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use common\models\Category;
use yii\grid\GridView;

/**
 * @var $dataProvider ActiveDataProvider
 * @var $searchModel CategorySearch
 * @var  $categories array
 */

$this->title = 'Категорії';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php if (Yii::$app->session->hasFlash('seccess')): ?>
<div class="alert alert-success">
    <?= Yii::$app->session->getFlash('seccess') ?>
</div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
<div class="alert alert-danger">
    <?= Yii::$app->session->getFlash('error'); ?>
</div>
<?php endif; ?>
<?= Html::a('Нова категорія', 'create', ['class' => 'btn btn-primary active'])  ?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        [
            'attribute' => 'parent_id',
            'value' => function (Category $category)
            {
                return $category->parent->title ?? null;
            },
            'filter' => $categories,
        ],
        [
            'attribute' => 'status',
            'value' => function (Category $category)
            {
                return $category->status === 1 ? 'Активний' : 'Заблоковоно';
            },
            'filter' => [
                Category::STATUS_ACTIVE => 'Активна',
                Category::STATUS_INACTIVE => 'Не активна',
            ]
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>


