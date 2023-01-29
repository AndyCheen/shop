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
    <?= $form->field($category, 'status')->dropDownList([
        Category::STATUS_INACTIVE => 'Не активна',
        Category::STATUS_ACTIVE => 'Активна',
    ], [
        'prompt' => 'Виберіть статус'
    ]) ?>
    <?= $form->field($category, 'parent_id')->dropDownList($categories,
    [
        'prompt' => 'Виберіть батьківську категорію'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Створити', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
