<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Rpublicidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rpublicidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rdescripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rfoto')->fileInput() ?>

    <?=
    $form->field($model, "rutEmpresa")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Empresas::find()->orderBy('rutEmpresa')->all(), 'rutEmpresa', 'nombreEmpresa'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione un Colaborador ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>
    <?= $form->field($model, 'rlink')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
