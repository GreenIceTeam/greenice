<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Publication */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Publication',
]) . ' ' . $model->id_publ;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Publications'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_publ, 'url' => ['view', 'id' => $model->id_publ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="publication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
