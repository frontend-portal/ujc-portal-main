<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\auth\models\AuthItemChildSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = Yii::t('app', 'Auth Item Children');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-index box-body">

    <div class="col-md-12">
<div class="box box-danger box-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Definir Permissões  '), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'parent',
			[
                'attribute'=>'parent',
                'value'=>'parent',
                'filter'=>  Html::activeDropDownList($searchModel, 'parent', ArrayHelper::map(\app\modules\auth\models\AuthItemChild::find()->asArray()->all(), 'parent', 'parent'), [ 'class' => "form-control", 'prompt'=>'']),
            ],
            [
                'attribute'=>'child',
                'value'=>'child',
                'filter'=>  Html::activeDropDownList($searchModel, 'child', ArrayHelper::map(\app\modules\auth\models\AuthItemChild::find()->asArray()->all(), 'child', 'child'), [ 'class' => "form-control",'prompt'=>'']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>
</div>