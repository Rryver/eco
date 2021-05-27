<?php

/* @var $this \yii\web\View */
/* @var $content string */

use kartik\helpers\Html;
use yii\bootstrap\NavBar;
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
            //'class' => 'navbar-inverse navbar-fixed-top',
            'class' => 'navbar-inverse navbar-center',
        ],
    ]);

    echo \frontend\widgets\ConfSelectorNav::widget();

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo \frontend\widgets\Nav::widget();
    NavBar::end();
    ?>

    <div class="container" style="padding-top: 51px;">
		<?php //ob_start(); ?>
		<div class="row">
            <div class="background">
			    <div class="col-sm-3">
				    <?= ''//Html::img('/uploads/site/logo.png', ['style' => 'margin: 20px 0 0 0; float: left;']) ?>
			    </div>
			    <div class="col-sm-6" style="background-color: white; opacity: 0.8; height: 100%;">
				    <h3 class="text-center">Российский научный форум</h3>
				    <h3 class="text-center" style="font-weight: bold;">«»</h3>
			    </div>
			    <div class="col-sm-3">
				    <?= ''//Html::img('/uploads/site/logo2.png', ['style' => 'margin: 20px 0 0 0; float: right;']) ?>
			    </div>
            </div>
        </div>
		<?php //$c = ob_get_clean(); ?>
		<?= ''//Html::well($c) ?>
        <?php /*echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="text">
                    <?= Alert::widget() ?>
                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
</div>

<?= $this->render('@frontend/views/layouts/_footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
