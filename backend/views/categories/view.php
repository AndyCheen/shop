<?php

use yii\widgets\DetailView;

/**
 * @var $category \common\models\Category
 * @var $this \yii\web\View
 *
 */

$this->title = $category->title;
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

echo DetailView::widget([
    'model' => $category,
    'attributes' => [
        'id',
        'title',
        [
            'attribute' => 'parent_id',
            'value' => $category->parent === null ? "null" : $category->parent->title . " ({$category->parent->id})"
        ],
        [
            'attribute' => 'status',
            'value' => $category->status === 1 ? "Active" : "Blocked",
            'contentOptions' => $category->status === 1 ? [
                "style" => "Background: #00FF00;"
            ] : [
                'style' => "Background: #DC143C;"
            ]
        ]
    ],
]);