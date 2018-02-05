<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ramigos */

$this->title = $model->rIdAmigos;
$this->params['breadcrumbs'][] = ['label' => 'Ramigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ramigos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'rIdAmigos' => $model->rIdAmigos, 'rut1' => $model->rut1, 'rut2' => $model->rut2], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'rIdAmigos' => $model->rIdAmigos, 'rut1' => $model->rut1, 'rut2' => $model->rut2], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'rIdAmigos',
            'rut1',
            'rut2',
        ],
    ]) ?>

</div>
