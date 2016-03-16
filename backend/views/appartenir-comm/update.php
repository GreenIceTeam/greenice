<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AppartenirComm */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Appartenir Comm',
]) . ' ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appartenir Comms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user, 'id_comm' => $model->id_comm]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="appartenir-comm-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
