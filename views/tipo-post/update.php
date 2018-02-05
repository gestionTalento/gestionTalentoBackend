<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Rtipopost */

$this->title = 'Update Rtipopost: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Rtipoposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ridtipo_post, 'url' => ['view', 'id' => $model->ridtipo_post]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rtipopost-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
