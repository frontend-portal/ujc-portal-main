<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItemChild */

$this->title = Yii::t('app', 'Actualizar {modelClass}: ', [
    'modelClass' => 'Atribuições',
]) . $model->parent;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atribuir Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<div class="auth-item-child-update box-body">

    <div class="col-md-12">
<div class="box box-danger box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>