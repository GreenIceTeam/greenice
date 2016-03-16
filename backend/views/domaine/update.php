<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Domaine */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Domaine',
]) . ' ' . $model->id_domaine;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Domaines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_domaine, 'url' => ['view', 'id' => $model->id_domaine]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="domaine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
