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
        //['label' => 'Главная', 'url' => ['/conf1/default/index']],
        [
            'label' => 'Участникам',
            'items' => [
                ['label' => 'Условия участия', 'url' => ['/conf1/default/participation-terms']],
                ['label' => 'Требования к докладам', 'url' => ['/conf1/default/reports-requirements']],
                ['label' => 'Форма заявки', 'url' => ['/conf1/default/application-form']],
                ['label' => 'Программа', 'url' => ['/conf1/default/program']],
                //['label' => 'Список участников', 'url' => '@web/files/conf1/Spisok_uchastnikov_Foruma.pdf', 'linkOptions' => ['target' => '_blank']],
                ['label' => 'Регистрация участника', 'url' => ['/lecture/create'], 'visible' => !\common\models\Conference::getConferenceById(\frontend\modules\conf1\Conf1::$confId)->registrationIsClosed()],
            ],
        ],
        ['label' => 'Ссылки на СМИ', 'url' => ['/conf1/default/links']],
        ['label' => 'Скачать', 'url' => ['/conf1/default/storage']],
        ['label' => 'Регистрация участника', 'url' => ['/lecture/create'], 'visible' => !\common\models\Conference::getConferenceById(\frontend\modules\conf1\Conf1::$confId)->registrationIsClosed()],
        ['label' => 'Контакты', 'url' => ['/conf1/default/contacts']],
    ];
    echo \frontend\widgets\Nav::widget([
        'items' => $menuItems,
    ]);

    echo \frontend\widgets\NavSecondRow::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-sec-row'],
    ]);
    NavBar::end();
    ?>

    <div id="layout-main-conf-1" class="container layout-main">
        <div class="row">
            <div class="col-sm-2">
                <?= Html::img('@web/files/conf1/logo_conf1.png', ['class' => 'logo-main-position', 'style' => 'width: 180px;']) ?>
            </div>
            <div class="col-sm-10">
                <h3 class="text-center">
                    <div>Российский научный форум</div>
                    <div>«Экология и общество: баланс интересов»</div>
                </h3>
                <h3 class="text-center">
                    <div>Россия, г. Вологда</div>
                    <div>ФГБУН ВолНЦ РАН</div>
                    <div>16-20 ноября 2020 года</div>
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
