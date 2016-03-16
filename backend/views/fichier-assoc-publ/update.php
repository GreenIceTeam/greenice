<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocPubl */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fichier Assoc Publ',
]) . ' ' . $model->id_fichier;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fichier Assoc Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fichier, 'url' => ['view', 'id_fichier' => $model->id_fichier, 'id_publ' => $model->id_publ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fichier-assoc-publ-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
