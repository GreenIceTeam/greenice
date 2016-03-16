<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Critique */

$this->title = $model->id_critique;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Critiques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="critique-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_critique], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_critique], [
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
            'id_critique',
            'id_auteur',
            'contenu:ntext',
            'date',
        ],
    ]) ?>

</div>
