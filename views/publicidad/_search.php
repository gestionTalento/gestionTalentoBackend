<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RpublicidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rpublicidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ridPublicidad') ?>

    <?= $form->field($model, 'rdescripcion') ?>

    <?= $form->field($model, 'rfoto') ?>

    <?= $form->field($model, 'rutEmpresa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
