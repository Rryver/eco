<?php


namespace frontend\widgets;


use yii\helpers\ArrayHelper;

class NavSecondRow extends \yii\bootstrap\Nav
{
    public static function widget($config = [])
    {
        $menuItems = [
            ['label' => 'Биологический турнир школьников', 'url' => ['/conf2/default/index']],
            ['label' => 'Межвузовская биологическая универсиада', 'url' => ['/conf3/default/index']],
        ];

        return parent::widget(ArrayHelper::merge($config, [
            'items' => $menuItems,
        ]));
    }
}