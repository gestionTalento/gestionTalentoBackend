<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dependencia */

$this->title = 'Update Dependencia: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Dependencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDependencias, 'url' => ['view', 'idDependencias' => $model->idDependencias, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dependencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
