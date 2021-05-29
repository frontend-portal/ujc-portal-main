<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\auth\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Perfis');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid box box-body box-success">
    
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '<i class="fa fa-users"></i> Criar Perfil'), ['create-papel'], ['class' => 'btn btn-primary']) ?>
        
        <?php // echo Html::a(Yii::t('app', 'Atribuir Permissões'), ['auth-item-child/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'name',
            'label'=>'Perfil',
            ],
            //'type',
            [
            'attribute'=>'description',
            'label'=>'Descrição',
            ],
            
            //'rule_name',
            //'data:ntext',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>