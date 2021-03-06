<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Curso */

$this->title = Yii::t('app', 'Create Curso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cursos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
