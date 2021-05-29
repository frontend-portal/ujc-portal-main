<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Artigo */

$this->title = Yii::t('app', 'Create Artigo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artigo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
