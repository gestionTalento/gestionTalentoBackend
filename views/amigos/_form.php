<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Ramigos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ramigos-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?=
    $form->field($model, "rut1")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Colaborador::find()->orderBy('rutColaborador')->all(), 'rutColaborador', 'correo'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione un Colaborador ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>

    <?=
    $form->field($model, "rut2")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Colaborador::find()->orderBy('rutColaborador')->all(), 'rutColaborador', 'correo'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione un Colaborador ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
