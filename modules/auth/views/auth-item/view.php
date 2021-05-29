<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItem */

$this->title = 'Perfil: '.$model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Papeis e Permissões'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid box box-body box-success">
    
    <p>
        <?= Html::a(Yii::t('app', 'Permissões'), ['auth-item-child/create', 'perfil' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Apagar'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apagar item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
           // 'type',
            'description:ntext',
           // 'rule_name',
           // 'data:ntext',
           // 'created_at',
          //  'updated_at',
        ],
    ]) ?>
    
</div>