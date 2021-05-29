<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItem */

$this->title = Yii::t('app', 'Criar Papel');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create box-body">
<div class="col-md-8">
<div class="box box-danger box-body">
   

    <?= $this->render('_form_papel', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>