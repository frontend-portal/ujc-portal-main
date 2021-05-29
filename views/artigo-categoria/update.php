<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtigoCategoria */

$this->title = Yii::t('app', 'Update Artigo Categoria: {name}', [
    'name' => $model->id_artigo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigo Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_artigo, 'url' => ['view', 'id_artigo' => $model->id_artigo, 'id_categoria' => $model->id_categoria]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="artigo-categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
