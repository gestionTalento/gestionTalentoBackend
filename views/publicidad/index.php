<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RpublicidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rpublicidads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rpublicidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rpublicidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ridPublicidad',
            'rdescripcion',
            'rfoto',
            'rutEmpresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
