<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoPostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rtipoposts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rtipopost-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rtipopost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ridtipo_post',
            'rnombreTipoPost',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
