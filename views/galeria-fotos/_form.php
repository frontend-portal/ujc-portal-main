<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GaleriaFotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="galeria-fotos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_galeria')->textInput() ?>

    <?= $form->field($model, 'id_foto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
