<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtigoArea */

$this->title = Yii::t('app', 'Update Artigo Area: {name}', [
    'name' => $model->id_artigo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigo Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_artigo, 'url' => ['view', 'id_artigo' => $model->id_artigo, 'id_area' => $model->id_area]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="artigo-area-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
