<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'eco2020',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'layout' => '@frontend/modules/conf1/views/layouts/main',
    'modules' => [
        'conf1' => frontend\modules\conf1\Conf1::class,
        'conf2' => frontend\modules\conf2\Conf2::class,
        'conf3' => frontend\modules\conf3\Conf3::class,
    ],
    'aliases' => [
        '@conf1' => '@frontend/modules/conf1',
        '@conf2' => '@frontend/modules/conf2',
        '@conf3' => '@frontend/modules/conf3',
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            //'showScriptName' => false,
            'rules' => [
                '/' => '/conf1/default/index',
            ],
        ],
    ],
    'params' => $params,
];
