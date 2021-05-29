<?php

use yii\helpers\Html;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthAssignment */
$us=new User();
$u=$us->findIdentity($model->user_id)->funcionario->fun_nome;
$this->title = Yii::t('app', '');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Utilizadores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $u, 'url' => ['../user/view', 'id' =>$model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Actualizar');
?>
<h3>
	Alterar Perfil de: <span class="text-primary"><?=$u ?></span>
</h3>
<div class="container-fluid box box-body box-success">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>