<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-6">
    <?= $form->field($model, 'parent')->dropDownList(
                ArrayHelper::map(app\modules\auth\models\AuthItem::find()->where(['type'=>1])->all(), 'name', 'name'), [ 
				'class' => "form-control", 'prompt'=>'',
				'onchange'=>'
				
                $.post(
					"' . Url::toRoute('getpermissions') . '", 
					{id: $(this).val()}, 
					function(res){
						$("#child").html(res);
					}
					);
				',
				
				]) ?>
	</div>

	<div class="col-md-12">
    <?= $form->field($model, 'child')->checkboxList([],['separator'=>'<br/>', 'id'=>'child',]) ?>
    </div>

	<div class="col-md-12">
	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
