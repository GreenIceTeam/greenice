<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CommLierSousDom */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Comm Lier Sous Dom',
]) . ' ' . $model->id_sous_dom;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comm Lier Sous Doms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sous_dom, 'url' => ['view', 'id_sous_dom' => $model->id_sous_dom, 'id_comm' => $model->id_comm]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="comm-lier-sous-dom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
