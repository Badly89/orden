<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('@web/img/site_logo.gif', ['alt' => Yii::$app->name]),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-expand-lg navbar-dark bg-dark sticky-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Официально', 'url' => ['/site/index']],
            ['label' => 'Суд', 'url' => ['/site/sud']],
            ['label' => 'Библиотека', 'url' => ['/site/biblio']],
            [
                'label' => 'Чистота',
                'items' => [
                    ['label' => 'Заявки на проверку', 'url' => '/site/zlist'],
                    ['label' => 'Проверенные заявки', 'url' => '/site/zready'],
                ]
            ],
            [
                'label' => 'Моя чистота',
                'items' => [
                    ['label' => 'Мои заявки', 'url' => 'site/myzlist'],
                    ['label' => 'Подать заявку', 'url' => 'site/newzayavka'],
                ]
            ],

        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => ' navbar-nav'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

        <div class="container">

            <?= Breadcrumbs::widget([
                'homeLink' => [
                    'label' => 'Главная ',
                    'url' => Yii::$app->homeUrl,
                    //  'title' => 'Первая страница сайта мастеров по ремонту квартир',
                    //любые атрибуты ссылки : class, style и т.п.
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

            <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>