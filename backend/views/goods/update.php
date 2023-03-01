<?php

use common\models\Good;

/**
 * @var $good Good
 * @var $categories array
 *
 */

$this->title = "Товар:{$good->id}";
$this->params['breadcrumbs'][] = [
    'label' => 'Товари',
    'url' => 'index'
];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('form', [
    'good' => $good,
    'categories' => $categories,
]); ?>
