<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CommLierSousDom */

$this->title = $model->id_sous_dom;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comm Lier Sous Doms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comm-lier-sous-dom-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_sous_dom' => $model->id_sous_dom, 'id_comm' => $model->id_comm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_sous_dom' => $model->id_sous_dom, 'id_comm' => $model->id_comm], [
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
            'id_sous_dom',
            'id_comm',
        ],
    ]) ?>

</div>
