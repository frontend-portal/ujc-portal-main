<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthAssignment */

$this->title = Yii::t('app', 'Atribuir Permissões');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-create box-body">
<div class="col-md-6">
<div class="box box-danger box-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>