<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

$this->title = 'ログイン';
?>

<div class="login">
    <h2 class="login_app-title">HoneyMilk</h2>
    <?php $form = ActiveForm::begin([
        'id' => 'login_form',
        'method' => 'post',
        'action' => '/auth/login',
        'fieldConfig' => [
            'labelOptions' => ['class' => 'col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'form-control'],
            'errorOptions' => ['class' => 'invalid-feedback'],
        ],
        'options' => ['class' => 'form-horizontal login_form-width']
    ]);?>
        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= Html::submitButton('ログイン', ['class' => 'btn btn-primary login_btn', 'name' => 'login_button']) ?>
    <?php ActiveForm::end() ?>
</div>
