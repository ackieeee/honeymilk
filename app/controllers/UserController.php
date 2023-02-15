<?php

namespace app\controllers;

use app\models\db\User;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionIndex()
    {
        $users = User::find()->all();
        return $this->render('index', [
            'users' => $users
        ]);
    }
}
