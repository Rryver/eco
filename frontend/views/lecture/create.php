<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lecture */

$this->title = 'Регистрация участника';
$this->params['breadcrumbs'][] = ['label' => 'Lectures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecture-create row">
    <div class="col-sm-12">
        <div class="text">
            <p class="text-2"><?= Html::encode($this->title) ?></p>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
