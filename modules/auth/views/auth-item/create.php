<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItem */

$this->title = Yii::t('app', 'Criar Regras');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
<div class="col-md-8">
<div class="box box-danger box-body">
   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>