<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItem */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Permissão ',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Papeis e Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="auth-item-update box-body">
<div class="col-md-8">
<div class="box box-danger box-body">
   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>