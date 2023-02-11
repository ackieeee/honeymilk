<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $form = new LoginForm();
        if (Yii::$app->request->isGet) {
            return $this->render('login', ['form' => $form]);
        }

        $form->attributes = Yii::$app->request->post();
        if (!$form->login()) {
            return $this->render('login', ['form' => $form]);
        }
        return $this->redirect('site/index');
    }
}
