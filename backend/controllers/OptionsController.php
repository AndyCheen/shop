<?php

namespace backend\controllers;

use backend\controllers\actions\options\CreateAction;
use backend\controllers\actions\options\DeleteAction;
use backend\controllers\actions\options\IndexAction;
use backend\controllers\actions\options\UpdateAction;
use backend\controllers\actions\options\ViewAction;
use common\models\Option;
use yii\web\Controller;

class OptionsController extends Controller
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