<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AppartenirCercle */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Appartenir Cercle',
]) . ' ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appartenir Cercles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user, 'id_cercle' => $model->id_cercle]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="appartenir-cercle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
