<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rpublicidad */

$this->title = 'Update Rpublicidad: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rpublicidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ridPublicidad, 'url' => ['view', 'ridPublicidad' => $model->ridPublicidad, 'rutEmpresa' => $model->rutEmpresa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rpublicidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
