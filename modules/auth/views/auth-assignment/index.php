<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
//use app\models\User;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\auth\models\AuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
//require(__DIR__ . '/../../../../models/User.php');
$this->title = Yii::t('app', 'Permissões');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-index box-body">
<div class="col-md-12">
<div class="box box-danger box-body">
   
   
    <?php Pjax::begin(); ?>
	<?php $user = Yii::$app->user->identityClass;?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Atribuir Permissões'), ['create'], ['class' => 'btn btn-success']) ?>
		
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
			//'user_id',
			[
                'attribute'=>'user_id',
                'value'=>'userIdUser.nome',
                'filter'=>  Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map($user::find()->asArray()->all(), 'id', 'nome'), [ 'class' => "form-control", 'prompt'=>'']),
            ],
           'item_name',
			// [
   //              'attribute'=>'item_name',
   //              'value'=>'userIdUser.nome',
   //              'filter'=>  Html::activeDropDownList($searchModel, 'user_id', ArrayHelper::map($user::find()->asArray()->all(), 'id', 'nome'), [ 'class' => "form-control"]),
   //          ],
           // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
</div>
</div>