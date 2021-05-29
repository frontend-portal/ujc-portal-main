<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItemChild */

$this->title = Yii::t('app', 'Configurar Permissões do Perfil: '.Yii::$app->request->get('perfil'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atribuir Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid box box-body box-success">
   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>