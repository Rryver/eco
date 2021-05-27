<?php
namespace common\helpers;

use Yii;
use yii\helpers\Html;

class SiteHelper
{
    public static function getSiteUrlHtmlRef()
    {
        $url = Yii::$app->params['siteUrl'];
        return Html::a($url, "http://{$url}");
    }
    
    public static function getAdminEmailHtmlRef()
    {
        $email = Yii::$app->params['adminEmail'];
        return Html::a($email, "mailto:{$email}");
    }
}
