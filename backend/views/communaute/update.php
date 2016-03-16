<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Communaute */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Communaute',
]) . ' ' . $model->id_comm;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Communautes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comm, 'url' => ['view', 'id' => $model->id_comm]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="communaute-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
