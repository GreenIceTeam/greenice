<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ListContacts */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'List Contacts',
]) . ' ' . $model->id_list;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_list, 'url' => ['view', 'id' => $model->id_list]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="list-contacts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
