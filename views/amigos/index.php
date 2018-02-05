<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RActividadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ramigos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ramigos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ramigos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rIdAmigos',
            'rut1',
            'rut2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
