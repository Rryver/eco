<?php
namespace frontend\modules\conf3;

class Conf3 extends \yii\base\Module
{
    public $layout = '@conf3/views/layouts/main.php';
    public static $confId = 3;
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\conf3\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
