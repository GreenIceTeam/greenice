<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RecevoirMess */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Recevoir Mess',
]) . ' ' . $model->id_dest;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recevoir Messes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dest, 'url' => ['view', 'id_dest' => $model->id_dest, 'id_mess' => $model->id_mess]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recevoir-mess-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
