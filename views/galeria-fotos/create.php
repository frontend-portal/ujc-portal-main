<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GaleriaFotos */

$this->title = Yii::t('app', 'Create Galeria Fotos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Galeria Fotos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="galeria-fotos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
