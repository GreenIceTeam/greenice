<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AimerPubl */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Aimer Publ',
]) . ' ' . $model->id_user;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aimer Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user, 'id_publ' => $model->id_publ]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="aimer-publ-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
