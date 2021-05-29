<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\modules\auth\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12">
        <?php
         
                echo $form->field($model, 'user_id')->hiddenInput()->label(false);
            

        ?>
        
    </div>

    <div class="col-md-12">
    <?php
        
            echo $form->field($model, 'item_name')->radioList(
                                ArrayHelper::map(\app\modules\auth\models\AuthItem::find()->where(['type'=>1])->all(), 'name', 'name'), ['separator'=>'<br>']);
      
           // echo $form->field($model, 'item_name')->dropDownList(
                 //               ArrayHelper::map(\app\modules\auth\models\AuthItem::find()->andWhere(['type'=>1])->andWhere(['name'=>'administrativa'])->all(), 'name', 'name'), [ 'class' => "form-control"]);  
        
    ?>
        
    </div>

    <div class="col-md-12">
    <?= $form->field($model, 'created_at')->hiddenInput()->label(false) ?>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Gravar') : Yii::t('app', 'Actualizar'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
