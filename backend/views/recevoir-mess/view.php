<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RecevoirMess */

$this->title = $model->id_dest;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recevoir Messes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recevoir-mess-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_dest' => $model->id_dest, 'id_mess' => $model->id_mess], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_dest' => $model->id_dest, 'id_mess' => $model->id_mess], [
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
            'id_dest',
            'id_mess',
            'affiche',
            'lu',
        ],
    ]) ?>

</div>
