<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ramigos */

$this->title = 'Create Ramigos';
$this->params['breadcrumbs'][] = ['label' => 'Ramigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ramigos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
