<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GaleriaFotos */

$this->title = Yii::t('app', 'Update Galeria Fotos: {name}', [
    'name' => $model->id_galeria,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Galeria Fotos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_galeria, 'url' => ['view', 'id_galeria' => $model->id_galeria, 'id_foto' => $model->id_foto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="galeria-fotos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
