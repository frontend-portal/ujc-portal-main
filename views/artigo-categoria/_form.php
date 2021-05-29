<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArtigoCategoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artigo-categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_artigo')->textInput() ?>

    <?= $form->field($model, 'id_categoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
