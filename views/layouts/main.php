<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-center'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Empresa', 'url' => ['/empresa/index']],
            ['label' => 'Sucursal', 'url' => ['/sucursal/index']],
            ['label' => 'Colaborador', 'url' => ['/colaborador/index']],
            ['label' => 'Perfil Red Social', 'url' => ['/perfil-red/index']],
            ['label' => 'Area', 'url' => ['/area/index']],
            ['label' => 'Cargos', 'url' => ['/cargos/index']],
            ['label' => 'Rol', 'url' => ['/rol/index']],
            ['label' => 'Gerencia', 'url' => ['/gerencia/index']],
            ['label' => 'Estado Colaborador', 'url' => ['/estadocolaborador/index']],
            ['label' => 'Perfil', 'url' => ['/perfil/index']],
            ['label' => 'Estadistica', 'url' => ['/restadisticas/index']],
            ['label' => 'Tipo Post', 'url' => ['/tipo-post/index']],
            ['label' => 'Amigos RedSocial', 'url' => ['/amigos/index']],
            ['label' => 'Centro Costo', 'url' => ['/centro-costo/index']],
            ['label' => 'Publicidad', 'url' => ['/publicidad/index']],
            ['label' => 'Tareas', 'url' => ['/tarea/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
