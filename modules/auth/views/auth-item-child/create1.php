<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItemChild */

//$this->title = Yii::t('app', 'Dar Permissao');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atribuir Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-create box-body">
<div class="col-md-12">
<div class="box box-danger box-body">
   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
</div>