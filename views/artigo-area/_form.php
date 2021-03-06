<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArtigoArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artigo-area-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_artigo')->textInput() ?>

    <?= $form->field($model, 'id_area')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
