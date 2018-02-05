<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Colaborador */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="colaborador-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rutColaborador')->textInput() ?>

    <?= $form->field($model, 'dvColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombreColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidosColaborador')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pass')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($perfil, 'rfoto')->fileInput() ?>

    <?= $form->field($perfil, 'rbio')->textInput(['maxlength' => true]) ?>


   

     <?=
    $form->field($model, "idestado")->widget(Select2::classname(), [
       'data' => ArrayHelper::map(app\models\Estadocolaborador::find()->orderBy('idestado')->all(), 'idestado', 'nombre'),
       'language' => 'es',
       'options' => ['placeholder' => 'Seleccione un estado ...'],
       'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>
     <?=
    $form->field($model, "idCC")->widget(Select2::classname(), [
       'data' => ArrayHelper::map(app\models\Icentrocosto::find()->orderBy('idCC')->all(), 'idCC', 'nombreCC'),
       'language' => 'es',
       'options' => ['placeholder' => 'Seleccione un centro de costo ...'],
       'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>
    <?=
    $form->field($model, "idSucursal")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Sucursal::find()->orderBy('idSucursal')->all(), 'idSucursal', 'nombreSucursal'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione una Sucursal...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>
    <?=
    $form->field($model, "idArea")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Area::find()->orderBy('idArea')->all(), 'idArea', 'nombreArea'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione un Area ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>

<?=
    $form->field($model, "idCargo")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Cargos::find()->orderBy('idCargo')->all(), 'idCargo', 'nombreCargo'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione un Cargo ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>

    <?=
        $form->field($model, "idRol")->widget(Select2::classname(), [
       'data' => ArrayHelper::map(app\models\Rol::find()->orderBy('idRol')->all(), 'idRol', 'nombreRol'),
       'language' => 'es',
       'options' => ['placeholder' => 'Seleccione un Rol ...'],
       'pluginOptions' => [
        'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, "idGerencia")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Gerencia::find()->orderBy('idGerencia')->all(), 'idGerencia', 'nombreGerencia'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione una Gerencia ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>
   
    <?=
    $form->field($model, "idperfil")->widget(Select2::classname(), [
   'data' => ArrayHelper::map(app\models\Perfil::find()->orderBy('idperfil')->all(), 'idperfil', 'nombre'),
   'language' => 'es',
   'options' => ['placeholder' => 'Seleccione un Perfil ...'],
   'pluginOptions' => [
    'allowClear' => true
    ],
]);
?>
     <?= $form->field($model, 'westadoJefe')->textInput() ?>
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
