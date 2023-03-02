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

<?= Html::a('Новий товар', 'create', ['class' => 'btn btn-primary active']); ?>

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
            'filter' => Good::STATUSES,
        ],
        'amount',
        'price',
        'new_price',
        ['class' => 'yii\grid\ActionColumn']
    ],
]); ?>