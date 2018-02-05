<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ramigos */

$this->title = 'Update Ramigos: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Ramigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rIdAmigos, 'url' => ['view', 'rIdAmigos' => $model->rIdAmigos, 'rut1' => $model->rut1, 'rut2' => $model->rut2]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ramigos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
