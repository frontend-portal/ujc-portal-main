<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Projecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="projecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resumo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data_carregamento')->textInput() ?>

    <?= $form->field($model, 'ficheiro')->textInput() ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
