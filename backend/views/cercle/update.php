<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cercle */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cercle',
]) . ' ' . $model->id_cercle;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cercles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_cercle, 'url' => ['view', 'id' => $model->id_cercle]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cercle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
