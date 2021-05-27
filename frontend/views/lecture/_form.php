<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Lecture */
/* @var $form yii\widgets\ActiveForm */

$options = ['labelOptions' => ['class' => 'text-2']];
?>

<div class="lecture-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'firstname', $options)->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'middlename', $options)->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'lastname', $options)->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'age', $options)->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'country', $options)->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'city', $options)->textInput(['maxlength' => true ]) ?>
        </div>
    </div>

    <?= $form->field($model, 'place_work', $options)->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position', $options)->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'phone', $options)->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'email', $options)->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'user_academic_degree_id', $options)->dropDownList(\common\models\UserAcademicDegree::getAllAsMap()) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'user_academic_rank_id', $options)->dropDownList(\common\models\UserAcademicRank::getAllAsMap()) ?>
        </div>
    </div>

    <?= $form->field($model, 'participation_format_id', $options)->dropDownList(\common\models\ParticipationFormat::getAllAsMap()) ?>

    <?= $form->field($model, 'section_id', $options)->dropDownList($model->conference->getSectionsMap()) ?>

    <?= $form->field($model, 'title', $options)->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uploadFile')->fileinput(['class' => 'uploadFileForm']) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
