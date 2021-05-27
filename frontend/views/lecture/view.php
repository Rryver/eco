<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Lecture */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Lectures', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecture-view row">
    <div class="col-sm-12">
        <div class="text">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'firstname',
                    'middlename',
                    'lastname',
                    'age',
                    'place_work',
                    'position',
                    'phone',
                    'email:email',
                    [
                        'attribute' => 'user_academic_degree_id',
                        'value' => $model->getDegree(),
                    ],
                    [
                        'attribute' => 'user_academic_rank_id',
                        'value' => $model->getRank(),
                    ],
                    [
                        'attribute' => 'conference_id',
                        'label' => 'Конференция',
                        'value' => $model->conference->name,
                    ],
                    [
                        'attribute' => 'section_id',
                        'value' => isset($model->section) ? $model->section->title : null,
                    ],
                    [
                        'attribute' => 'participation_format_id',
                        'value' => $model->getParticipationFormat(),
                    ],
                    'title',
                    [
                        'attribute' => 'created_at',
                        'label' => 'Зарегистрирован',
                        'value' => date("Y-m-d в H:i:s", $model->created_at),
                    ],
//                    [
//                        'attribute' => 'file_id',
//                        'value' => 'в работе',
//                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
