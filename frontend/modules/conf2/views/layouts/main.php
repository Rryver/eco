<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\helpers\Html;
use yii\bootstrap\NavBar;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => $this->render('@frontend/views/layouts/_brand'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    //echo \frontend\widgets\ConfSelectorNav::widget();
    
    $menuItems = [
        //['label' => 'Главная', 'url' => ['/conf2/default/index']],
        ['label' => 'Ссылки на СМИ', 'url' => ['/conf1/default/links']],
        ['label' => 'Скачать', 'url' => ['/conf1/default/storage']],
        ['label' => 'Контакты', 'url' => ['/conf2/default/contacts']],
    ];
    echo \frontend\widgets\Nav::widget([
        'items' => $menuItems,
    ]);

    echo \frontend\widgets\NavSecondRow::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-sec-row'],
    ]);
    NavBar::end();
    ?>

    <div class="container layout-main">
        <div class="row">
            <div class="col-sm-2">
                <?= Html::img('@web/files/conf2/logo_conf2.png', ['class' => 'logo-main-position', 'style' => 'width: 220px;']) ?>
            </div>
            <div class="col-sm-10">
                <h3 class="text-center">
                    <div>Биологический турнир школьников</div>
                    <br>
                </h3>
                <h3 class="text-center">
                    <div>Россия, г. Вологда</div>
                    <div>ФГБУН ВолНЦ РАН</div>
                    <div>17 ноября 2020 года</div>
                </h3>
            </div>
        </div>
        <?php
        if ($flash = Yii::$app->session->getFlash('success'))
            {
                echo $this->render('@frontend/views/layouts/_flash');
            }
        ?>
        <?= $content ?>
    </div>
</div>

<?= $this->render('@frontend/views/layouts/_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
