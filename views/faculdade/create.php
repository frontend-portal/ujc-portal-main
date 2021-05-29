<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faculdade */

$this->title = Yii::t('app', 'Create Faculdade');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Faculdades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculdade-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
