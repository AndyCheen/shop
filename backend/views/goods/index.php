<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use \backend\models\GoodsSearch;
use common\models\Category;
use common\models\Good;


$this->title = 'Товари';
$this->params['breadcrumbs'][] = $this->title;


/**
 * @var $dataProvider ActiveDataProvider
 * @var $searchModel GoodsSearch
 * @var $categories array
 */

?>

<?php if (Yii::$app->session->hasFlash('access')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('seccess') ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?= Html::a('Новий товар', ['goods/create'], ['class' => 'btn btn-primary active']); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        [
            'attribute' => 'category_id',
            'value' => function (Good $good) {
                return $good->category->title ?? null;
            },
            'filter' => $categories,
        ],
        [
            'attribute' => 'status',
            'value' => function (Good $good) {
                return $good->status === Good::STATUS_ACTIVE ? 'Активний' : 'Заблокований';
            },
            'filter' => [
                Good::STATUS_ACTIVE => 'Активний',
                Good::STATUS_INACTIVE => 'Заблокований'
            ]

        ],
        'amount',
        'price',
        'new_price',
        ['class' => 'yii\grid\ActionColumn']
    ],
]); ?>