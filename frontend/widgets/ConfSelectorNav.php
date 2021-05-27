<?php

namespace frontend\widgets;

class ConfSelectorNav extends \yii\bootstrap\Nav
{
    public static function widget($config = []) {
        return parent::widget(array_merge($config, [
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => [
                [
                    'label' => 'Выбор мероприятия',
                    'items' => [
                        ['label' => 'Российский научный форум «Экология и общество: баланс интересов»', 'url' => ['/conf1/default/index']],
                        ['label' => 'Биологический турнир школьников', 'url' => ['/conf2/default/index']],
                        ['label' => 'Межвузовская биологическая универсиада', 'url' => ['/conf3/default/index']],
                    ],
                ],
            ],
        ]));
    }
}
