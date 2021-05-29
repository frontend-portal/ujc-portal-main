<?php

use yii\helpers\Html;
use app\models\User;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthAssignment */
$us=new User();
$u=$us->findIdentity(Yii::$app->request->get('user'))->funcionario->fun_nome;
$this->title = Yii::t('app', '');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h2>
	Atribuir Perfil a: <span class="text-primary"><?=$u ?></span>
</h2>
<div class="container-fluid box box-body box-success">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>