<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Option;
use backend\models\OptionsSearch;
use yii\data\ActiveDataProvider;


$this->title = 'Параметри';
$this->params['breadcrumbs'][] = $this->title;

/**
 * @var $dataProvider ActiveDataProvider
 * @var $searchModel OptionsSearch
 * @var $categories array
 */

?>

<?= Html::a('Новий параметер', 'create', ['class' => 'btn btn-primary active']); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'id',
        'title',
        [
            'attribute' => 'category_id',
            'value' => function (Option $option) {
                return $option->category->title ?? 'Корнева категорія';
            },
            'filter' => $categories,
        ],
        'type',
        ['class' => 'yii\grid\ActionColumn'],
    ]
]); ?>
