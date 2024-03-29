<?php

namespace backend\controllers;

use backend\controllers\actions\goods\CreateAction;
use backend\controllers\actions\goods\DeleteAction;
use backend\controllers\actions\goods\IndexAction;
use backend\controllers\actions\goods\UpdateAction;
use backend\controllers\actions\goods\ViewAction;
use yii\web\Controller;

class GoodsController extends Controller
{

    public function actions(): array
    {
        return [
            'index' => IndexAction::class,
            'create' => CreateAction::class,
            'view' => ViewAction::class,
            'update' => UpdateAction::class,
            'delete' => DeleteAction::class,
        ];
    }
}