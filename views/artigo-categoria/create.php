<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtigoCategoria */

$this->title = Yii::t('app', 'Create Artigo Categoria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigo Categorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artigo-categoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
