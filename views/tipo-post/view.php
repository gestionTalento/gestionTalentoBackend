<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rtipopost */

$this->title = $model->ridtipo_post;
$this->params['breadcrumbs'][] = ['label' => 'Rtipoposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rtipopost-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ridtipo_post], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ridtipo_post], [
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
            'ridtipo_post',
            'rnombreTipoPost',
        ],
    ]) ?>

</div>
