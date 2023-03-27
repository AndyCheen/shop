<?php

use common\models\Good;
use yii\widgets\DetailView;
use yii\helpers\Html;

/**
 * @var $good Good
 * @var $this \yii\web\View
 */


$this->title = "Товар: {$good->id}";

$this->params['breadcrumbs'][] = [
    'label' => 'Товари',
    'url' => 'index',
];
$this->params['breadcrumbs'][] = $this->title;


echo DetailView::widget([
    'model' => $good,
    'attributes' => [
        'id',
        'title',
        [
            'attribute' => 'category_id',
            'value' => $good->category->title,
        ],
        [
            'attribute' => 'status',
            'value' => $good->status === 1 ? 'Активний' : 'Не активний'
        ],
        'amount',
        'price',
        'new_price',
        'rating',
        'description'
    ],
]);
?>

<div>
    <?php foreach ($good->goodsAttachments as $attachment): ?>
        <div><?= Html::img(DIRECTORY_SEPARATOR . $attachment->url, [
                'width' => 200,
            ]) ?></div>
    <?php endforeach; ?>
</div>
