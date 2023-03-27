<?php

use common\models\Option;
use yii\widgets\DetailView;

/**
 * @var Option $option
 */

$this->title = "{$option->title} (id: {$option->id})";

$this->params['breadcrumbs'][] = [
    'label' => 'Параметри',
    'url' => 'index'
];
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'model' => $option,
    'attributes' => [
        'id',
        'title',
        [
            'attribute' => 'category_id',
            'value' => function (Option $option) {
                return $option->category->title ?? 'Корнева категорія';
            }
        ],
        'type'
    ]
]);


