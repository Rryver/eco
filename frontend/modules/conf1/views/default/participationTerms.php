<?php
/* @var $this yii\web\View */

$this->title = "Условия участия";
?>

<div class="row">
    <div class="col-sm-12">
        <div class="text">
            <div class="text-1">Порядок участия:</div>
            <p>
                Для участия в Форуме необходимо пройти регистрацию на сайте
                <a href="<?= \yii\helpers\Url::home() ?>">eco2020.volnc.ru</a> до 20 октября 2020 года,
                заполнив заявку по предложенной форме
                (см. <a href="<?= \yii\helpers\Url::to(['default/application-form']) ?>">Участникам / Форма заявки</a>),
                с обязательным указанием формата участия и темы доклада. Тезисы доклада,
                оформленные в соответствии с требованиями
                (см. <a href="<?= \yii\helpers\Url::to(['default/reports-requirements'])?>">Участникам / Требования к докладам</a>),
                можно подать при регистрации либо отправить их на адрес
                <?= \common\helpers\SiteHelper::getAdminEmailHtmlRef() ?> с обязательным указанием в теме письма
                слова «Форум» в срок до 9 ноября 2020 года.
            </p>
            <p>
                Материалы, присланные позже указанного срока, к рассмотрению не принимаются и обратно
                авторам не высылаются. Статьи проходят проверку на наличие заимствований в системе
                <a href="https://www.antiplagiat.ru">«Антиплагиат»</a> должны содержать не менее
                70% оригинального текста. Высылая материалы на конференцию, автор выражает свое
                согласие с передачей ФГБУН ВолНЦ РАН права на их размещение в открытом доступе в сети
                Интернет, а также удостоверяет тот факт, что представленный доклад нигде ранее не публиковался.
            </p>

            <div>
                <a href="<?= \yii\helpers\Url::to('@web/files/conf1/Информационное письмо. Форум Экология и общество. Баланс интересов.docx') ?>">
                    Информационное письмо </a>
                <br>
                <a href="<?= \yii\helpers\Url::to('@web/files/conf1/Требования по оформлению.docx') ?>">
                    Требования к оформлению тезисов докладов
                </a>
            </div>
        </div>
    </div>
</div>
