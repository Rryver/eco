<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\LectureSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Зарегестрированные доклады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lecture-index row">
    <div class="col-sm-12">
        <div class="horizontalWrapper">
            <h2><?= Html::encode($this->title) ?></h2>
            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Регистрация доклада', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'ФИО',
                        'attribute' => 'fio',
                        'contentOptions' => ['style' => 'width: 5%'],
                        'value' => function ($model) {
                            return $model->getFio();
                        },
                    ],
                    //'email:email',
                    /*[
                        'label' => 'Конференция',
                        'attribute' => 'conference_id',
                        'filter' => \common\models\Conference::getAllAsMap(),
                        'value' => function ($model) {
                            return $model->conference->name;
                        },
                    ],*/
                    [
                        'attribute' => 'place_work',
                        'contentOptions' => ['style' => 'width: 20%; text-overflow: clip'],
                    ],
                    [
                        'attribute' => 'title',
                        'contentOptions' => ['style' => 'width:30%;'],
                    ],
                    [
                        'attribute' => 'section_id',
                        'headerOptions' => ['style' => 'width: 20%;'],
                        'contentOptions' => ['style' => 'width 20%;'],
                        'value' => function($model) {
                            return $model->section->title;
                        },
                        'filter' => function($model) {
                            return $model->conference->getSectionsMap();
                        },
                    ],
                    [
                        'label' => 'Формат участия',
                        'attribute' => 'participation_format_id',
                        'contentOptions' => ['style' => 'width: 5%;'],
                        'filter' => \common\models\ParticipationFormat::getAllAsMap(),
                        'value' => function($model) {
                            return $model->getParticipationFormat();
                        },

                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'headerOptions' => ['style' => 'width:30px'],
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
