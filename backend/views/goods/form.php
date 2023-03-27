<?php

use yii\widgets\ActiveForm;
use common\models\Good;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $good Good
 * @var $categories array
 * @var $this View
 *
 */
$this->registerJsFile('/js/goodsForm.js');
$this->registerCssFile('/css/goodsForm.css');
$arr = ['1' => 'sdsds', '22' => 'rtyuio'];
$asrStr = json_encode($arr);
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ;?>
<?= $form->field($good, 'title')->textInput(); ?>

<?= $form->field($good, 'category_id')->dropDownList($categories); ?>

<?= $form->field($good, 'status')->dropDownList(Good::STATUSES); ?>

<?= $form->field($good, 'description')->textarea(); ?>

<?= $form->field($good, 'amount')->textInput(); ?>
<?= $form->field($good, 'price')->textInput(); ?>
<?= $form->field($good, 'new_price')->textInput(); ?>

<?= Html::button('Додати параметр', [
        'class' => 'btn btn-warning btn-add-option',
        'onclick' => "addOptionForm($asrStr)"
    ]); ?>

<div id="add-options-form-conatiner"></div>

<?= $form->field($good, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

<div>
    <?php foreach ($good->goodsAttachments as $attachment): ?>
    <div>
        <?= Html::img(DIRECTORY_SEPARATOR . $attachment->url, [
                'width' => 200,
        ]); ?>
    </div>
    <?php endforeach; ?>
</div>
<div>
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']); ?>
</div>

<?php ActiveForm::end(); ?>
