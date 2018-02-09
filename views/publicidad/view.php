<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rpublicidad */

$this->title = $model->ridPublicidad;
$this->params['breadcrumbs'][] = ['label' => 'Rpublicidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rpublicidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ridPublicidad' => $model->ridPublicidad, 'rutEmpresa' => $model->rutEmpresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ridPublicidad' => $model->ridPublicidad, 'rutEmpresa' => $model->rutEmpresa], [
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
            'ridPublicidad',
            'rdescripcion',
            'rfoto',
            'rutEmpresa',
            'rlink',
        ],
    ]) ?>

</div>
