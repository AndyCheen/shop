<?php

use common\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $category Category
 * @var $categories array
 */
?>


<?php $form = ActiveForm::begin() ?>
<?= $form->field($category, 'title')->textInput() ?>

<?= $form->field($category, 'parent_id')->dropDownList($categories, [
    'prompt' => 'Корнева категорія'
]); ?>
<?= $form->field($category, 'status')->dropDownList([
    Category::STATUS_ACTIVE => 'Активна',
    Category::STATUS_INACTIVE => 'Не активна',
]) ?>
<div class="form-group">
    <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
