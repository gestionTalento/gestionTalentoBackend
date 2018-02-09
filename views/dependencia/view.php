<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dependencia */

$this->title = $model->idDependencias;
$this->params['breadcrumbs'][] = ['label' => 'Dependencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dependencia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idDependencias' => $model->idDependencias, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idDependencias' => $model->idDependencias, 'rutColaborador1' => $model->rutColaborador1, 'rutColaborador2' => $model->rutColaborador2], [
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
            'idDependencias',
            'rutColaborador1',
            'rutColaborador2',
        ],
    ]) ?>

</div>
