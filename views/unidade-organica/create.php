<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UnidadeOrganica */

$this->title = Yii::t('app', 'Create Unidade Organica');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidade Organicas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidade-organica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
