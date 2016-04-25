<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Critique */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Critique',
]) . ' ' . $model->id_critique;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Critiques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_critique, 'url' => ['view', 'id' => $model->id_critique]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="critique-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
