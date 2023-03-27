<?php

use common\models\Option;

/**
 * @var $option Option
 * @var $categories array
 */

$this->title = "Параметр id: {$option->id}";

$this->params['breadcrumbs'][] = [
    'label' => 'Параметри',
    'url' => 'index'
];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= $this->render('form', [
    'option' => $option,
    'categories' => $categories,
]); ?>