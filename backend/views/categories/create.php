<?php

use common\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $category Category
 * @var $categories array
 * @var $this \yii\web\View
 */

$this->title = 'Створення категорії';
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?= $this->render('form', [
    'category' => $category,
    'categories' => $categories,
]) ?>
