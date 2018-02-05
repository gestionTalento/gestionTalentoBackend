<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rtipopost */

$this->title = 'Create Rtipopost';
$this->params['breadcrumbs'][] = ['label' => 'Rtipoposts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rtipopost-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
