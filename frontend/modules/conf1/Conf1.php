<?php
namespace frontend\modules\conf1;

class Conf1 extends \yii\base\Module
{
    public $layout = '@conf1/views/layouts/main.php';
    public static $confId = 1;
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\conf1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
