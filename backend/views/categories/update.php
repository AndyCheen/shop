<?php

use common\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/**
 * @var $category Category
 * @var $categories array
 * @var $this \yii\web\View
 */

$this->title = 'Оновлення категорії';
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?= $this->render('form', [
        'category' => $category,
        'categories' => $categories,
]) ?>
