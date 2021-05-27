<?php
/* @var $this yii\web\View */

$this->title = "Контакты";

$email = \Yii::$app->params['adminEmail'];
?>

<div class="row">
    <div class="col-sm-12">
        <div class="text">
            <div class="text-2"> Контакты</div>
            <p> По вопросам, связанным с участием в конференции, обращаться</p>
            <p> 160014, г. Вологда, ул. Горького, д. 56-А, ФГБУН ВолНЦ РАН.</p>
            <p> Тел.: 8(8172)59-78-25 - Лаборатория биоэкономики и устойчивого развития</p>
            <p> e-mail: <?= \common\helpers\SiteHelper::getAdminEmailHtmlRef() ?></p>

        </div>
    </div>
</div>

<div>
    <?= \yii\helpers\Html::img('@web/files/contacts.png', ['style' => 'margin: 20px 0 0 90px; float: left; width: 550px;']) ?>
</div>
