<?php

use yii\widgets\ActiveForm;
use common\models\Good;
use yii\helpers\Html;

/**
 * @var $good Good
 * @var $categories array
 *
 */

?>
<?php $form = ActiveForm::begin() ;?>
<?= $form->field($good, 'title')->textInput(); ?>

<?= $form->field($good, 'category_id')->dropDownList($categories); ?>

<?= $form->field($good, 'status')->dropDownList([
    Good::STATUS_ACTIVE => 'Активний',
    Good::STATUS_INACTIVE => 'Не активний',
]); ?>

<?= $form->field($good, 'description')->textarea(); ?>

<?= $form->field($good, 'amount')->textInput(); ?>
<?= $form->field($good, 'price')->textInput(); ?>
<?= $form->field($good, 'new_price')->textInput(); ?>

<div>
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']); ?>
</div>

<?php ActiveForm::end(); ?>
