<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ArtigoArea */

$this->title = Yii::t('app', 'Create Artigo Area');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigo Areas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artigo-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
