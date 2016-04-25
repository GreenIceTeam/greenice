<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocMess */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Fichier Assoc Mess',
]) . ' ' . $model->id_fichier;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fichier Assoc Messes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fichier, 'url' => ['view', 'id_fichier' => $model->id_fichier, 'id_mess' => $model->id_mess]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="fichier-assoc-mess-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
