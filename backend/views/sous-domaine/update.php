<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SousDomaine */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sous Domaine',
]) . ' ' . $model->id_sous_dom;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sous Domaines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sous_dom, 'url' => ['view', 'id' => $model->id_sous_dom]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sous-domaine-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
