<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Artigo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="artigo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'autor')->textInput() ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_publicacao')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'rascunho' => 'Rascunho', 'publicado' => 'Publicado', 'lixeira' => 'Lixeira', 'a espera de aprovacao' => 'A espera de aprovacao', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'data_criacao')->textInput() ?>

    <?= $form->field($model, 'data_actualizacao')->textInput() ?>

    <?= $form->field($model, 'imagem')->textInput() ?>

    <?= $form->field($model, 'acesso')->dropDownList([ 'publico' => 'Publico', 'privado' => 'Privado', ], ['prompt' => '']) ?>

    <?php // echo $form->field($model, 'conteudo')->textarea(['rows' => 6]); ?>
    <?=$form->field($model, 'conteudo')->widget(\yii\redactor\widgets\Redactor::className(),
        [
            'clientOptions' => [
            'imageUpload' => \yii\helpers\Url::to(['/redactor/upload/image']),
            ],
        ]
    )?>

    <?= $form->field($model, 'lead')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
