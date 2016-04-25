<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Commentaire */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Commentaire',
]) . ' ' . $model->id_comment;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Commentaires'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comment, 'url' => ['view', 'id' => $model->id_comment]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="commentaire-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
