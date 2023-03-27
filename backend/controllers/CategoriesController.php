<?php

namespace backend\controllers;

use backend\controllers\actions\categories\CreateAction;
use backend\controllers\actions\categories\DeleteAction;
use backend\controllers\actions\categories\IndexAction;
use backend\controllers\actions\categories\UpdateAction;
use backend\controllers\actions\categories\ViewAction;
use backend\models\CategorySearch;
use common\models\Category;
use common\models\Good;
use Yii;
use yii\data\Pagination;
use yii\db\Exception;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoriesController extends Controller
{
    public function actions(): array
    {
        return [
            'index' => IndexAction::class,
            'create' => CreateAction::class,
            'view' => ViewAction::class,
            'update' => UpdateAction::class,
            'delete' => DeleteAction::class

        ];
    }
}