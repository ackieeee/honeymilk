<?php

/** @var yii\web\View $this */

use app\assets\AppAsset;
use yii\bootstrap5\Dropdown;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?= $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <header id="header">
            <?php
            NavBar::begin([
                'brandLabel' => 'HoneyMilk',
                'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
            ]);
            ?>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            メニュー
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a href="/users" class="dropdown-item">ユーザー一覧</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav justify-content-end w-100'],
                'items' => [
                    Yii::$app->user->isGuest
                    ? ['label' => 'Login', 'url' => ['/auth/login']]
                    : '<li class="nav-item">'
                        . Html::beginForm(['/auth/logout'])
                        . Html::submitButton(
                            'Logout',
                            ['class' => 'nav-link btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>',
                ]
            ]);
            NavBar::end();
            ?>
        </header>
        <div class="content">
            <?= $content ?>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
