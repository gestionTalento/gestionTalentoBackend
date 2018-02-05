<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Rperfilredsocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rperfilredsocial-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'rfoto')->fileInput(); ?>

    <?= $form->field($model, 'rportada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rbio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rrotador')->textInput() ?>

    <?= $form->field($model, 'restado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
