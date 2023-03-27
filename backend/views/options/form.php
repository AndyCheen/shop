<?php

use common\models\Option;
use yii\widgets\ActiveForm;
use yii\helpers\Html;

/**
 * @var $option Option
 * @var $categories array
 */
array_unshift($categories, 'Корнева категорія');

$form = ActiveForm::begin();
?>

<?= $form->field($option, 'title')->textInput(); ?>
<?= $form->field($option, 'category_id')->dropDownList($categories); ?>
<?= $form->field($option, 'type')->dropDownList(Option::TYPES); ?>

<?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']); ?>

<?php ActiveForm::end(); ?>
