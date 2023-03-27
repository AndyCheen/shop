<?php

use common\models\Option;

/**
 * @var $option Option
 * @var $categories array
 * @var $this \yii\web\View
 */

$this->title = 'Створення параметра';

$this->params['breadcrumbs'][] = [
    'label' => 'Параметри',
    'url' => 'index',
];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('form', [
    'option' => $option,
    'categories' => $categories,
]); ?>