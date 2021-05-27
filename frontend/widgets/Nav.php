<?php

namespace frontend\widgets;

use Yii;

class Nav extends \yii\bootstrap\Nav
{
    public static function widget($config = []) {
        $menuItems = [
            [
                'label' => 'Доклады',
                'url' => ['/lecture/index'],
                'visible' => !Yii::$app->user->isGuest,
            ],
        ];
        
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
        } else {
            $menuItems[] = [
                'label' => 'Выйти',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']
            ];
        }
        
        return parent::widget(\yii\helpers\ArrayHelper::merge($config, [
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]));
    }
}
