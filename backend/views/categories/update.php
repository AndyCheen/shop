<?php

use common\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $category Category
 * @var $categories array
 */
?>


<?php
// Видаляю дану категорію зі списку категорій щоб унеможливити вказання даної категорії собі ж в батьківську.
$parent_categories = $categories;
unset($parent_categories[$category->id]);

// Додаю корневу категорію в масив для можливості перенесення категорії в корневу.
$parent_categories[0] = "Коренева категорія";

?>

<?php $form = ActiveForm::begin() ?>
    <?= $form->field($category, 'title')->textInput() ?>

    <?= $form->field($category, 'parent_id')->dropDownList($parent_categories,
    [
        'options' => [
            $category->parent_id => [
                        'selected' => true
                ]
        ]
    ]); ?>
    <?= $form->field($category, 'status')->dropDownList([
        Category::STATUS_INACTIVE => 'Не активна',
        Category::STATUS_ACTIVE => 'Активна',
    ], [
        'options' => [
                $category->status => [
                        'selected' => true
                ]
        ]
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
