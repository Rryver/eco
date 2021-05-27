<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lecture */

$this->title = 'Update Lecture: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lectures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lecture-update row">
    <div class="col-sm-12">
        <div class="text">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
