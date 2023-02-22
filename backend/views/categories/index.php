<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use common\models\Category;

    $this->title = 'Categories';
    $this->params['breadcrumbs'][] = $this->title;

    $model = new Category();
?>
<style>
    td, th{
        padding: 5px;
    }
    tr:nth-child(even){
        background-color: #ddd;
    }
    tr.table-head{
        background-color: #FFD573;
    }
</style>
<h1>Categories</h1>

<?php $form = ActiveForm::begin(); ?>
<!--    --><?php //= $form->field($model, 'name') ?>
<?php ActiveForm::end(); ?>

<?= Html::a('Створити категорію', 'create', [
        'class' => 'btn btn-primary',
]) ?>
<table>
    <thead>
        <tr class="table-head">
            <th>ID</th>
            <th>Назва</th>
            <th>Статус</th>
            <th>Батьківська категорія</th>
            <th>Створено</th>
            <th>Оновлено</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $category->id ?></td>
                <td><?= Html::a($category->title, ['categories/view', 'id' => $category->id]) ?></td>
                <td><?= $category->status ?></td>
                <td><?= $category->parent_id ?></td>
                <td><?= $category->created_at ?></td>
                <td><?= $category->updated_at ?></td>
                <td>
                    <?= Html::a('&#9998;', ['categories/update', 'id' => $category->id]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= LinkPager::widget(['pagination' => $pagination]) ?>
