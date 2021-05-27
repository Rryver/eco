<?php
namespace frontend\modules\conf2;

class Conf2 extends \yii\base\Module
{
    public $layout = '@conf2/views/layouts/main.php';
    public static $confId = 2;
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\conf2\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
