<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public $layout = 'auth';
    public function actionIndex()
    {
        $form = new LoginForm();
        return $this->render(
            'index',
            [
                'model' => $form,
            ]
        );
    }

    public function actionLogin()
    {
        $form = new LoginForm();
        if (Yii::$app->request->isGet) {
            return $this->render('index', ['model' => $form]);
        }

        // $form->attributes = Yii::$app->request->post();
        $form->load(Yii::$app->request->post());
        if ($form->login()) {
            Yii::info('login successful');
            return $this->goHome();
        }
        // ログイン失敗しているのでパスワードを空にして表示
        Yii::info($form);
        $form->password = '';
        return $this->render('index', [
            'model' => $form,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        $form = new LoginForm();
        return $this->render('index', ['model' => $form]);
    }
}
