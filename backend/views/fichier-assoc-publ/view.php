<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocPubl */

$this->title = $model->id_fichier;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fichier Assoc Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fichier-assoc-publ-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_fichier' => $model->id_fichier, 'id_publ' => $model->id_publ], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_fichier' => $model->id_fichier, 'id_publ' => $model->id_publ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_fichier',
            'id_publ',
        ],
    ]) ?>

</div>
