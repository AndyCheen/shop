<?php

use common\models\Good;

/**
 * @var $good Good
 * @var $categories array
 * @var $this \yii\web\View
 */

$this->title = 'Створення товару';
$this->params['breadcrumbs'][] = [
    'label' => 'Товари',
    'url' => ['index']
];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= $this->render('form', [
    'good' => $good,
    'categories' => $categories,
]);